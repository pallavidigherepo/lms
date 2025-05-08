<?php
namespace App\Repositories;

use App\Models\Standard;
use App\Http\Resources\StandardResource;
use App\Repositories\Interfaces\StandardRepositoryInterface;
use App\Http\Requests\StandardRequest;

class StandardRepository implements StandardRepositoryInterface
{
    public function all($request)
    {
        $field = $request->input('sort_field') ?? 'id';
        $order = $request->input('sort_order') ?? 'desc';
        $perPage = $request->input('per_page') ?? 10;

        return StandardResource::collection(
            Standard::when($request->input('search'), function ($query) {
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
            $standard = Standard::create($inputs);
            $standard->sections()->sync($request->standard_section_ids);

            $standard->standard_section_ids = $request->standard_section_ids;

            $sectionNames = array();
            if (!empty($standard->sections)) {
                foreach ($standard->sections as $section) {
                    $sectionNames[] = $section->name;
                }
            }

            $standard->standard_section_names = $sectionNames;
            $response = [
                'success' => true,
                'message' => 'Standard created successfully.',
                'standard' => $standard,
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

    public function update($request, $standard)
    {
        if ($request->validated()) {
            $standard->name = $request->name;

            $standard->save();
            $standard->sections()->sync($request->standard_section_ids);

            $standard->standard_section_ids = $request->standard_section_ids;

            $sectionNames = array();
            if (!empty($standard->sections)) {
                foreach ($standard->sections as $section) {
                    $sectionNames[] = $section->name;
                }
            }

            $standard->standard_section_names = $sectionNames; //$request->standard_section_ids;
            $response = [
                'success' => true,
                'message' => 'Standard updated successfully.',
                'standard' => $standard,
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

    public function delete($standard)
    {
        $response = [
            'success' => false,
            'message' => null,
            'errors' => null,
        ];
        if ($standard->delete()) {
            $response = [
                'success' => true,
                'message' => 'Standard deleted successfully.',
                'standard' => $standard,
            ];
        }
        return response()->json($response);
    }
}
