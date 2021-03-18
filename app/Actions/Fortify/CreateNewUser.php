<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
// Added to create user with and permission
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;
    // Added to create user with and permission
    use HasRoles;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
            //'roles' => 'required'
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
        // Added to assign role and permission to newly added user.
        // User registered from front end will always be added as student. 
        // There are list of all the permissions to be assigned to user type student.
        // :$user->assignRole('student');
        /*$user->assignRole('writer', 'admin', 'super-admin');
        $user->givePermissionTo('delete articles');*/
        return $user;
    }
}
