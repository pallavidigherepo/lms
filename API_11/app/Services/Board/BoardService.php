<?php
namespace App\Services\Board;

use App\Http\Requests\BoardRequest;
use App\Models\Board;
use App\Repositories\Interfaces\BoardRepositoryInterface;
use Illuminate\Http\Request;

class BoardService
{

    public function __construct(protected BoardRepositoryInterface $boardRepository) { }

    public function all($request)
    {
        return $this->boardRepository->all($request);
    }


    public function create(BoardRequest $request)
    {

        return $this->boardRepository->create($request);
    }

    public function update(Request $request, $board)
    {
        // if (!$request->validated()) {
        //     return false;
        // }

        return $this->boardRepository->update($request, $board);
    }


    public function delete(Board $board)
    {
        return $this->boardRepository->delete($board);
    }

}
