<?php
namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

Interface BaseRepositoryInterface
{
    public function find(int $id);

    public function create($data): mixed;
}
