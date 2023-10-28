<?php

namespace App\Repositories;

use App\Contracts\UserInterface;
use App\Models\User;
class UserRepository implements UserInterface
{
    public function create($data)
    {
        $user = new User;
        $user->first_name = $data['firstName'];
        $user->last_name = $data['lastName'];
        $user->user_name = $data['userName'];
        $user->phone = $data['phone'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->birthday = $data['birthday'];
        $user->gender = $data['gender'];
        $user->bio = $data['bio'] ?? null;
        $user->picture = $data['picture'] ?? null;
        $user->save();

        return $user;
    }
    
}
