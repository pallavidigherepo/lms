<?php

namespace Database\Seeders;

use App\Models\Batch;
use Illuminate\Database\Seeder;

class BatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $batches = [
            ['name' => '2023-2024'],
            ['name' => '2022-2023'],
        ];

        foreach ($batches as $batch) {
            $input = [
                'name' => $batch['name']
            ];
            Batch::create($input);
        }
    }
}
