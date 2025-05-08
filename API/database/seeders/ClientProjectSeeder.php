<?php

namespace Database\Seeders;

use App\Models\ClientProject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClientProject::create([
            'client_name' => 'erasumthana',
            'site_name' => 'Era Sumthana ERP',
            'site_url' => 'http://erasumthana.meritest.in',
            'site_logo_path' => '',
            'storage_absolute_path' => "/home/u353217617/domains/meritest.in/public_html/erasumthana/public/",
            'connection' => 'mysql',
            'host' => 'localhost',
            'port' => '3306',
            'database' => 'u353217617_erasumthana',
            'username' => 'u353217617_erasumthana',
            'password' => "7iX;|BK2izVG"
        ]);
    }
}
