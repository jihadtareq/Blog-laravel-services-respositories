<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;
use App\Http\Resources\UserResource;
// use App\Http\Resources\UserCollection;
class UserService 
{
    private $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function all()
    {
        return UserResource::collection($this->userRepository->all());
    }

    public function register($data)
    {
        $pictureName = time().'.'.$data['picture']->getClientOriginalExtension();
        $data['picture']->move(public_path('images'), $pictureName);
        $data['picture'] = $pictureName;
        $user =  $this->userRepository->create($data);
        $user->accessToken = $user->createToken('users')->accessToken; 
        return new UserResource($user);
    }

}