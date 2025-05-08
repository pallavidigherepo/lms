<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                "name" => 'Owner',
                "permissions" => [1, 2, 3, 4, 5]
            ],
            [
                "name" => 'Administrator',
                "permissions" => [1, 2, 3, 4, 5]
            ],
            [
                "name" => 'Teacher',
                "permissions" => [1, 5]
            ]
        ];

        foreach ($roles as $role) {
            $input = [
                'name' => $role['name']
            ];
            $new = Role::create($input);

            $new->syncPermissions($role['permissions']);
        }
    }
}
