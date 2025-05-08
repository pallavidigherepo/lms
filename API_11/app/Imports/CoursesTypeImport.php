<?php

namespace App\Imports;

use App\Models\CoursesType;
use Illuminate\Contracts\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CoursesTypeImport implements ToModel, WithHeadingRow, WithValidation
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
        return new CoursesType([
            'label'       => json_encode($row['label']),
            'description' => json_encode($row['description']),
            'icon'        => $row['icon'],
        ]);
    }

    public function rules(): array
    {
        return [
            'label' => 'required|unique:courses_types',
            // Above is alias for as it always validates in batches
            '*.label' => 'required|unique:courses_types',

            // Can also use callback validation rules
            'description' => 'required',
            '*.description' => 'required'
        ];
    }
}
