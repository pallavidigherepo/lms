<?php

namespace Database\Seeders;

use App\Models\FeeDiscount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeeDiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $discounts = [
            [
                'name' => 'One Time Payment',
                'amount' => 1000,
                'expiry_date' => "2023-06-25"
            ],
            [
                'name' => 'Siblings',
                'amount' => 1000,
                'expiry_date' => "2023-12-31"
            ],
            [
                'name' => 'Staff Ward',
                'amount' => 1000,
                'expiry_date' => NULL
            ],
        ];

        foreach ($discounts as $discount) {
            $input = [
                'name' => $discount['name'],
                'amount' => $discount['amount'],
                'expiry_date' => $discount['expiry_date']
            ];
            FeeDiscount::create($input);
        }
    }
}
