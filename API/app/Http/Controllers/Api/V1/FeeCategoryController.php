<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\FeeCategoryResource;
use App\Models\FeeCategory;
use App\Http\Requests\StoreFeeCategoryRequest;
use App\Http\Requests\UpdateFeeCategoryRequest;
use App\Services\FeeCategory\FeeCategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

/**
 * This class is FeeCategoryController controller class with all fees management related functions and variables.
 *
 * @package Meritest_LMS_FeeCategory_Controller
 * @author Pallavi Dighe <pallavi@meritest.in>
 * @acces public
 * @version 1.0
 * @since 1.0
 * @see http://lms.meritest.in/fee_categories
 */
class FeeCategoryController extends Controller
{
    public function __construct(protected FeeCategoryService $feeCategoryService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return ResourceCollection
     */
    public function index(Request $request):ResourceCollection
    {
        return $this->feeCategoryService->all($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFeeCategoryRequest  $request
     * @return JsonResponse
     */
    public function store(StoreFeeCategoryRequest $request):JsonResponse
    {
        if (!$request->validated()) {
            return false;
        }
       
        $feeCategory = $this->feeCategoryService->create($request);

        if (!$feeCategory) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Created Successfully', 'data' => $feeCategory], 201);
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeeCategory  $feeCategory
     * @return FeeCategoryResource
     */
    public function show($id)
    {
        return FeeCategoryResource::make(FeeCategory::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFeeCategoryRequest  $request
     * @param  \App\Models\FeeCategory  $feeCategory
     * @return JsonResponse
     */
    public function update(UpdateFeeCategoryRequest $request, FeeCategory $feeCategory)
    {
        $feeCategory = $this->feeCategoryService->update($request, $feeCategory);
        if (!$feeCategory) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information Updated Successfully', 'data' => $feeCategory], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeeCategory  $feeCategory
     * @return JsonResponse
     */
    public function destroy(FeeCategory $feeCategory)
    {
        if (!$this->feeCategoryService->delete($feeCategory)) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information deleted Successfully'], 201);
    }
}
