<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\LeaveBalance;
use App\Models\LeaveStatus;

class LeaveController extends Controller
{
    public function applyLeave(Request $request)
    {
        $request->validate([
            'leave_type_id' => 'required',
            'from' => 'required|date',
            'to' => 'required|date|after_or_equal:from',
            'reason' => 'nullable|string',
        ]);

        $balance = LeaveBalance::where('user_id', auth()->id())
            ->where('leave_type_id', $request->leave_type_id)
            ->first();

        if (!$balance || $balance->balance <= 0) {
            return response()->json(['error' => 'Insufficient leave balance'], 400);
        }

        $leave = Leave::create([
            'user_id' => auth()->id(),
            'leave_type_id' => $request->leave_type_id,
            'from' => $request->from,
            'to' => $request->to,
            'description' => $request->description,
            'leave_statuses_id' => LeaveStatus::where('name', 'Pending')->first()->id,
        ]);

        return response()->json($leave, 201);
    }

    public function viewLeaveBalance()
    {
        $balances = LeaveBalance::where('user_id', auth()->id())->with('leaveType')->get();
        return response()->json($balances);
    }

    public function viewLeaveRequests()
    {
        $requests = Leave::with(['user', 'leaveType', 'status'])->get();
        return response()->json($requests);
    }

    public function approveLeave($id)
    {
        $leave = Leave::findOrFail($id);
        $leave->status_id = LeaveStatus::where('name', 'Approved')->first()->id;
        $leave->save();

        return response()->json(['message' => 'Leave approved successfully']);
    }

    public function rejectLeave($id)
    {
        $leave = Leave::findOrFail($id);
        $leave->status_id = LeaveStatus::where('name', 'Rejected')->first()->id;
        $leave->save();

        return response()->json(['message' => 'Leave rejected successfully']);
    }
}

