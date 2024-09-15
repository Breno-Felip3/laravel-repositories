<?php
namespace App\Repositories\Core;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Exceptions\NotTableDefined;
use Illuminate\Support\Facades\DB;

class BaseQueryBuilderRepository implements RepositoryInterface
{
    protected $tb;
    public function __construct()
    {
        $this->tb = $this->resolveTable();
    }

    public function getAll()
    {
        return DB::table($this->tb)->get();
    }

    public function findById($id)
    {
        return DB::table($this->tb)->find($id);
    }

    public function paginate($totalPage = 15)
    {
        return DB::table($this->tb)->paginate($totalPage);
    }

    public function create(array $data)
    {
        return DB::table($this->tb)->insert($data);
    }

    public function update($id, array $data)
    {
        return DB::table($this->tb)->where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return DB::table($this->tb)->where('id', $id)->delete();
    }

    public function resolveTable()
    {
        if (! property_exists($this, 'table')){
            throw new NotTableDefined();
        }

        return $this->table;
    }

    public function search($search)
    {
        return $this->entity->where('title', 'like', "%$search%")
                        ->orWhere('url', 'like', "%$search%")
                        ->orWhere('description', 'like', "%$search%")
                        ->orderBy('id', 'desc')
                        ->paginate();
        
    
    }   
}