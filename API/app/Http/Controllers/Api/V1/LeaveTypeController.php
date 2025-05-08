<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LeaveType;

class LeaveTypeController extends Controller
{
    public function index()
    {
        return LeaveType::all();
    }

    public function store(Request $request)
    {
        $leaveType = LeaveType::create($request->all());
        return response()->json($leaveType, 201);
    }

    public function show($id)
    {
        return LeaveType::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $leaveType = LeaveType::findOrFail($id);
        $leaveType->update($request->all());
        return response()->json($leaveType, 200);
    }

    public function destroy($id)
    {
        LeaveType::destroy($id);
        return response()->json(null, 204);
    }
}
