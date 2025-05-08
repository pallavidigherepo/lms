<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Board;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name' => 'CBSE'],
            ['name' => 'IGCSE'],
            ['name' => 'State Board'],
        ];

        foreach ($types as $type) {
            $input = [
                'name' => $type['name']
            ];
            Board::create($input);
        }
    }
}
