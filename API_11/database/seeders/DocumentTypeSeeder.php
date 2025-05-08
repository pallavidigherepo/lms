<?php

namespace Database\Seeders;

use App\Models\DocumentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $documentTypes = [
            [
                'name' => 'Aadhar Card',
            ],
            [
                'name' => 'Birth Certificate',
            ],
            [
                'name' => 'Termination Certificate(TC) of previous school',
            ],
            [
                'name' => 'Parent Caste Certificate',
            ],
            [
                'name' => 'Student Caste Certificate',
            ],
            [
                'name' => 'Parent TC If Any',
            ],
            [
                'name' => 'Ration Card',
            ],
            [
                'name' => 'Parents Photo',
            ],
            [
                'name' => 'Family Photo',
            ],
            [
                'name' => 'Parent Pan Card',
            ],
            [
                'name' => 'Parent Aadhar Number',
            ],
        ];

        foreach ($documentTypes as $documentType) {
            $input = [
                'name' => $documentType['name']
            ];
            DocumentType::create($input);
        }
    }
}
