<?php
namespace App\Repositories;
use App\Repositories\Contracts\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

interface UserRepositoryInterface extends EloquentRepositoryInterface
{
    function getUserByEmail(string $email) : ?Model ;
    function deactivateAccount(int $id,string $reason) : bool ;
    function reactivateAccount(int $id) : avoid ;

}