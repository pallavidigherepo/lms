<?php

namespace Database\Seeders;

use App\Models\InquiryFollowupType;
use App\Models\InquiryType;
use Illuminate\Database\Seeder;

class InquiryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name' => 'Cold Calling'],
            ['name' => 'Warm Calling'],
            ['name' => 'Email'],
            ['name' => 'WhatsApp'],
            ['name' => 'Normal Call'],
        ];
        foreach ($types as $type) {
            $input = [
                'name' => $type['name']
            ];
            InquiryFollowupType::create($input);
        }
    }
}
