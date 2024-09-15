<?php
namespace App\Repositories\Contracts;

interface RepositoryInterface
{
    public function getAll();
    public function findById($id);
    public function paginate($totalPage = 15);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}


