<?php

namespace App\Imports;

use App\Models\Permission;
use Illuminate\Contracts\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class PermissionImport implements ToModel, WithHeadingRow, WithValidation
{
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
        return new Permission([
            'name'     => $row['name'],
            'guard_name'    => $row['guard_name'],
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => 'required|unique:permissions',
            // Above is alias for as it always validates in batches
            '*.name' => 'required|unique:permissions',

            // Can also use callback validation rules
            'guard_name' => 'required',
            '*.guard_name' => 'required'
        ];
    }
}
