<?php

namespace App\Repositories\Contracts;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface EloquentRepositoryInterface
{

    /*
    interface that will contain all the common methods 
    that are used when we are accessing our database to retrieve, 
    store, and remove data. (CRUD)
    */

    public function all(array $columns = ['*'],array $relations = [] ) : Collection ;

    public function allTrashed() : Collection ;

    public function findById(int $id,array $columns=['*'],array $relations = [],array $appends = []) : ?Model ;

    public function findTrashedById(int $id) : ?Model ;

    public function create(array $payload) : ?Model;
    public function update(int $id,array $payload) : bool;

    public function deleteById(int $id) : bool;

    public function restoreById(int $id) : bool;

    public function permanentlyDeleteById(int $id) : bool;
    




}