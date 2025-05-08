<?php

namespace Database\Seeders;

use App\Models\InquiryStatus;
use Illuminate\Database\Seeder;

class InquiryStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name' => 'Open'],
            ['name' => 'Close'],
            ['name' => 'Waiting for Response'],
            ['name' => 'Accepted'],
            ['name' => 'Rejected'],
        ];
        foreach ($types as $type) {
            $input = [
                'name' => $type['name']
            ];
            InquiryStatus::create($input);
        }
    }
}
