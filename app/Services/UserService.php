<?php

namespace App\Services;

use App\Exceptions\BusinessException;
use App\Repositories\UserRepositoryInterface;
use App\Http\Resources\UserResource;
use Illuminate\Support\Arr;
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
        $data['password'] = bcrypt($data['password']);
        $user =  $this->userRepository->create($data);
        $user->accessToken = $user->createToken('users')->accessToken; 
        return new UserResource($user);
    }

    public function getUserById($id)
    {
        return new UserResource($this->userRepository->findById($id));

    }

    public function updateUserInformation($data)
    {
       return $this->userRepository->update($data['user']->id,Arr::except($data, 'user'));
    }

    public function deactivateUserAccount($data)
    {
        $reason = isset($data['reason']) ? $data['reason'] : null;
        $is_deactivate = $this->userRepository->deactivateAccount($data['user']->id,$reason);
        if(!$is_deactivate)
             throw new BusinessException('Account does not deactivted ,please try again');

    }
    public function reactivateAccount($data)
    {
        if($data['isDeactivate'])
           $this->userRepository->reactivateAccount($data['id']);

    }

}