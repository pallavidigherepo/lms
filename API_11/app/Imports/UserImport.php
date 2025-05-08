<?php

namespace App\Imports;

use App\Models\ProfileUser;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\Importable;

class UserImport implements ToModel, WithHeadingRow, WithValidation
{
    use Importable;

    public function startRow(): int
    {
        return 2;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $inputs = [
            'name'=> $row['name'],
            'email' => $row['email'],
            'password' => Hash::make(123456789)
        ];
        $user = User::create($inputs);
        $profile = new ProfileUser([
            'mobile' => $row['mobile'],
            'designation' => $row['designation'],
        ]);
        $user->profile_user()->save($profile);

        $user->assignRole($row['designation']);
        return $user;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:users',
            // Above is alias for as it always validates in batches
            '*.email' => 'required|unique:users',

            // Can also use callback validation rules
            'mobile' => 'required',
            '*.mobile' => 'required',

            // Can also use callback validation rules
            'designation' => 'required',
            '*.designation' => 'required'
        ];
    }

}
