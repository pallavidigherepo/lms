<?php
namespace App\Repositories;

use App\Models\Board;
use App\Http\Resources\BoardResource;
use App\Repositories\Interfaces\BoardRepositoryInterface;
use App\Http\Requests\BoardRequest;

class BoardRepository implements BoardRepositoryInterface
{
    public function all($request)
    {
        $field = $request->input('sort_field') ?? 'id';
        $order = $request->input('sort_order') ?? 'desc';
        $perPage = $request->input('per_page') ?? 10;

        return BoardResource::collection(
            Board::when($request->input('search'), function ($query) {
                $query->where('name', 'like', '%' . request('search') . '%');
            })->orderBy($field, $order)->paginate($perPage)
        );
    }

    public function create($request)
    {
        if ($request->validated()) {
            $inputs = [
                'name'=> $request->name,
            ];
            $board = Board::create($inputs);
            $response = [
                'success' => true,
                'message' => 'Board created successfully.',
                'board' => $board,
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Oops, there seems to have some errors.',
                'errors' => $this->validated()->errors(),
            ];
        }
        return response()->json($response);
    }

    public function show($id)
    {
        //
    }

    public function update($request, $board)
    {
        if ($request->validated()) {
            $board->name = $request->name;

            $board->save();
            $response = [
                'success' => true,
                'message' => 'Board updated successfully.',
                'board' => $board,
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Oops, there seems to have some errors.',
                'errors' => $this->validated()->errors(),
            ];
        }
        return response()->json($response);
    }

    public function delete($board)
    {
        $response = [
            'success' => false,
            'message' => null,
            'errors' => null,
        ];
        if ($board->delete()) {
            $response = [
                'success' => true,
                'message' => 'Board deleted successfully.',
                'board' => $board,
            ];
        }
        return response()->json($response);
    }
}
