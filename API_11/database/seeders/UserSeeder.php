<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inputs = [
            'name'=> 'Pallavi Dighe',
            'email' => 'pals.ver@gmail.com',
            'password' => Hash::make(123456789),
        ];
        $profile = [            
            'mobile' => 7030501188,
            'designation' => 'Chief Technical Officer',
        ];
        $user = User::create($inputs);
        $user->profile_user($profile);

        $inputs = [
            'name'=> 'Minal Shamgule',
            'email' => 'ss.minal@gmail.com',
            'password' => Hash::make(123456789),
            
        ];
        $profile = [            
            'mobile' => 9850627909,
            'designation' => 'Product Manager',
        ];
        $user = User::create($inputs);

        $user->profile_user($profile);
        $inputs = [
            'name'=> 'Sudhir Mishra',
            'email' => 'sudhirff@gmail.com',
            'password' => Hash::make(123456789),
        ];
        $profile = [            
            'mobile' => 7620098848,
            'designation' => 'Chief Executive Officer',
        ];
        $user = User::create($inputs);
        $user->profile_user($profile);
    }
}
