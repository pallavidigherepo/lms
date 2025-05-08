<?php

namespace Database\Seeders;

use App\Models\FeeType;
use Illuminate\Database\Seeder;

class FeeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name' => 'Policy Holders',
            ],
            [
                'name' => 'Right To Education (RTE)',
            ],
            [
                'name' => 'Sponsored',
            ],
            [
                'name' => 'Regular',
            ],
            [
                'name' => "Teacher Ward",
            ],
        ];

        foreach ($types as $type) {
            $input = [
                'name' => $type['name'],
            ];
            FeeType::create($input);
        }
    }
}
