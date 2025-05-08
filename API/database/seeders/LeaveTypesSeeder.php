<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LeaveType;

class LeaveTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => 'Sick Leave'],
            ['name' => 'Casual Leave'],
            ['name' => 'Vacation Leave'],
            ['name' => 'Maternity/Paternity Leave'],
            ['name' => 'Medical Leave'],
        ];
        foreach ($types as $type) {
            $input = [
                'name' => $type['name']
            ];
            LeaveType::create($input);
        }
        
    }
}
