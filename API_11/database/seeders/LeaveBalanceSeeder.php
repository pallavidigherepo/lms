<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\LeaveType;
use App\Models\LeaveBalance;

class LeaveBalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $leaveTypes = LeaveType::all();
        $users = User::all();

        foreach ($users as $user) {
            foreach ($leaveTypes as $leaveType) {
                LeaveBalance::create([
                    'user_id' => $user->id,
                    'leave_type_id' => $leaveType->id,
                    'balance' => $this->getInitialBalance($leaveType->name),
                ]);
            }
        }
    }
    private function getInitialBalance($leaveTypeName)
    {
        switch ($leaveTypeName) {
            case 'Sick Leave':
                return 12;
            case 'Casual Leave':
                return 12;
            case 'Vacation Leave':
                return 15;
            case 'Maternity/Paternity Leave':
                return 15;
            case 'Medical Leave':
                return 15;
            default:
                return 5;
        }
    }
}
