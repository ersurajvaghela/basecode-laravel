<?php

namespace Tests\Unit\Services;

use App\Models\User;
use App\Services\UserService;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Mockery;

class UserServiceTest extends TestCase {

    protected $userRepository;
    protected $userService;

    protected function setUp(): void {
        parent::setUp();

        $this->userRepository = Mockery::mock(UserRepositoryInterface::class);
        $this->userService = new UserService($this->userRepository);
    }

    public function test_create_user_hashes_password() {
        $userData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123'
        ];

        $expectedUser = new User($userData);
        $expectedUser->id = 1;

        $this->userRepository
                ->shouldReceive('create')
                ->once()
                ->with(Mockery::on(function ($data) {
                            return Hash::check('password123', $data['password']);
                        }))
                ->andReturn($expectedUser);

        $result = $this->userService->createUser($userData);

        $this->assertInstanceOf(User::class, $result);
        $this->assertEquals('John Doe', $result->name);
    }

    public function tearDown(): void {
        Mockery::close();
        parent::tearDown();
    }

}
