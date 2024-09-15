<?php

namespace App\Repositories\Core;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Exceptions\NotEntityDefined;

class BaseEloquentRepository implements RepositoryInterface
{
    protected $entity;
    public function __construct()
    {
        $this->entity = $this->resolveEntity();
    }

    public function getAll()
    {
       return $this->entity->orderBy('id', 'desc')->with('category')->paginate();;
    }

    public function findById($id)
    {
        return $this->entity->find($id);
    }

    public function paginate($totalPage = 15)
    {
        return $this->entity->paginate($totalPage);
    }

    public function create(array $data)
    {
        return $this->entity->create($data);
    }

    public function update($id, array $data)
    {
        $entity = $this->findById($id);
        $entity->update($data);
    }

    public function delete($id)
    {
        $entity = $this->findById($id);
        $entity->delete();
    }

    public function resolveEntity()
    {
        if (! method_exists($this, 'entity')){
            throw new NotEntityDefined();
        }

        return app($this->entity());
    }
}