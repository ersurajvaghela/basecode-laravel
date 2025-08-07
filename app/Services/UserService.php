<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserService {

    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function createUser(array $data): User {
        return DB::transaction(function () use ($data) {
                    $data['password'] = Hash::make($data['password']);
                    $user = $this->userRepository->create($data);

                    Log::info('User created successfully', ['user_id' => $user->id]);

                    // Additional business logic here
                    // Send welcome email, create profile, etc.

                    return $user;
                });
    }

    public function updateUser(User $user, array $data): User {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $updatedUser = $this->userRepository->update($user, $data);

        Log::info('User updated successfully', ['user_id' => $user->id]);

        return $updatedUser;
    }

    public function getAllUsers() {
        return $this->userRepository->paginate();
    }

    public function getUserById(int $id): ?User {
        return $this->userRepository->findWithPosts($id);
    }

    public function searchUsers(string $query) {
        return $this->userRepository->search($query);
    }

    public function activateUser(User $user): User {
        return $this->userRepository->update($user, ['is_active' => true]);
    }

    public function deactivateUser(User $user): User {
        return $this->userRepository->update($user, ['is_active' => false]);
    }

    public function deleteUser(User $user): bool {
        return DB::transaction(function () use ($user) {
                    // Delete related data first
                    $user->posts()->delete();

                    // Delete user
                    $result = $this->userRepository->delete($user);

                    Log::info('User deleted successfully', ['user_id' => $user->id]);

                    return $result;
                });
    }

}
