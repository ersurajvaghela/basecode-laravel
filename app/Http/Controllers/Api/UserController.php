<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Services\UserService;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="Laravel API",
 *     description="Laravel API Documentation",
 *     @OA\Contact(
 *         email="admin@example.com"
 *     )
 * )
 */
class UserController extends BaseController {

    protected $userService;
    protected $userRepository;

    public function __construct(
            UserService $userService,
            UserRepositoryInterface $userRepository
    ) {
        $this->userService = $userService;
        $this->userRepository = $userRepository;
    }

    /**
     * @OA\Get(
     *     path="/api/v1/users",
     *     summary="Get list of users",
     *     tags={"Users"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="search",
     *         in="query",
     *         description="Search users by name or email",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="per_page",
     *         in="query",
     *         description="Number of users per page",
     *         required=false,
     *         @OA\Schema(type="integer", default=15)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Users retrieved successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean"),
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     )
     * )
     */
    public function index(Request $request): JsonResponse {
        try {
            if ($request->has('search')) {
                $users = $this->userRepository->search($request->get('search'));
                $users = new UserCollection(collect($users));
            } else {
                $users = $this->userRepository->paginate($request->get('per_page', 15));
                $users = new UserCollection($users);
            }

            return $this->successResponse($users, 'Users retrieved successfully');
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to retrieve users', 500);
        }
    }

    public function show(int $id): JsonResponse {
        try {
            $user = $this->userService->getUserById($id);

            if (!$user) {
                return $this->errorResponse('User not found', 404);
            }

            return $this->successResponse(
                            new UserResource($user),
                            'User retrieved successfully'
            );
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to retrieve user', 500);
        }
    }

    public function store(StoreUserRequest $request): JsonResponse {
        try {
            $user = $this->userService->createUser($request->validated());

            return $this->successResponse(
                            new UserResource($user),
                            'User created successfully',
                            201
            );
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to create user', 500);
        }
    }

    public function update(UpdateUserRequest $request, int $id): JsonResponse {
        try {
            $user = $this->userRepository->find($id);

            if (!$user) {
                return $this->errorResponse('User not found', 404);
            }

            $updatedUser = $this->userService->updateUser($user, $request->validated());

            return $this->successResponse(
                            new UserResource($updatedUser),
                            'User updated successfully'
            );
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to update user', 500);
        }
    }

    public function destroy(int $id): JsonResponse {
        try {
            $user = $this->userRepository->find($id);

            if (!$user) {
                return $this->errorResponse('User not found', 404);
            }

            $this->userService->deleteUser($user);

            return $this->successResponse(null, 'User deleted successfully');
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to delete user', 500);
        }
    }

}
