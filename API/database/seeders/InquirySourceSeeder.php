<?php

namespace Database\Seeders;

use App\Models\InquirySource;
use Illuminate\Database\Seeder;

class InquirySourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name' => 'Facebook'],
            ['name' => 'Sulekha'],
            ['name' => 'Personal'],
        ];
        foreach ($types as $type) {
            $input = [
                'name' => $type['name']
            ];
            InquirySource::create($input);
        }
    }
}
