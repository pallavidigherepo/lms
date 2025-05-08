<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LeaveStatus;

class LeaveStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => 'Pending'],
            ['name' => 'Accepted'],
            ['name' => 'Rejected'],
        ];
        foreach ($types as $type) {
            $input = [
                'name' => $type['name']
            ];
            LeaveStatus::create($input);
        }
    }
}
