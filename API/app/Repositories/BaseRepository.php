<?php
namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BaseRepository implements BaseRepositoryInterface
{
    public function __construct(){
        //dd($model);
    }

    public function find(int $id)
    {
        //return $this->model->findOrFail($id)->toArray();
    }

    public function create($data)
    {
        //return $this->model->create($data)->toArray();
    }
}
