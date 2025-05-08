<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Standard;

class StandardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name' => 'Nursery'],
            ['name' => 'Jr.KG.'],
            ['name' => 'Sr.KG.'],
            ['name' => '1st'],
            ['name' => '2nd'],
            ['name' => '3rd'],
            ['name' => '4th'],
            ['name' => '5th'],
            ['name' => '6th'],
            ['name' => '7th'],
            ['name' => '8th'],
            ['name' => '9th'],
            ['name' => '10th'],
            ['name' => '11th'],
            ['name' => '12th'],
        ];

        foreach ($types as $type) {
            $input = [
                'name' => $type['name']
            ];
            Standard::create($input);
        }
    }
}
