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


    public function deactivateAccount(int $id,string $reason) : bool
    {
        $user = $this->model::find($id);
        return $user->update([
            'is_deactivate' => 1,
            'deactivate_reason' => $reason
       ]);
    }

    public function reactivateAccount(int $id)
    {
        $user = $this->model::find($id);
        $user->is_deactivate =0;
        $user->save();
    }
    
}
