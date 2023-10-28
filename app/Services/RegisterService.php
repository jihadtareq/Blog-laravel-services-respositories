<?php

namespace App\Services;

use App\Repositories\UserRepository;

class RegisterService 
{
    private $userRepo;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepo = $userRepository;
    }

    public function createUser($data)
    {
        return $this->userRepo->create($data);
    }

}