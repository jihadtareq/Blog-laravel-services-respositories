<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getUserByEmail(string $email) : ?Model 
    {
        return $this->model::where('email',$email)->first();
        
    }

    //overWrite method if you need it

    // protected function customizePayload(array $data) : array {
    //     return [
    //         'first_name'=>$data['firstName'],
    //         'last_name'=>$data['lastName'],
    //         'user_name'=>$data['userName'],
    //         'phone'=>$data['phone'],
    //         'email'=>$data['email'],
    //         'password'=>$data['password'],
    //         'birthday'=>$data['birthday'],
    //         'picture'=>$data['picture'] ?? null,
    //         'bio'=>$data['bio'],
    //         'gender'=>$data['gender'],
    //     ];

    // }
    
}
