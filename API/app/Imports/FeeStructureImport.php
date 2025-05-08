<?php

namespace App\Imports;

use App\Models\FeeStructure;
use App\Models\Standard;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class FeeStructureImport implements ToModel, WithHeadingRow, WithValidation
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
        //print_r($row['standard']);
        $standard = Standard::where('name', $row['standard'])->first();
        //print_r($standard->id);
        //$row['standard'];
        return new FeeStructure([
            'standard_id' => $standard->id,
            'batch_id' => $row['batch'],
            'fee_type_id' => $row['fee_type'],
            'fee_category_id' => $row['fee_category'],
            'amount' => $row['amount'],
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
        ]);
    }


    public function rules(): array
    {
        return [
            'standard' => 'required',
            'batch' => 'required',
            'fee_type' => 'required',
            'fee_category' => 'required',
            'amount' => 'required',
        ];
    }
}
