<?php

namespace App\Imports;

use App\Models\Inquiry;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Date;

class InquiryImport implements ToModel, WithHeadingRow, WithValidation
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
     * @throws \Exception
     */
    public function model(array $row)
    {
        $input = [
            'unique_code' => generate_unique_code_inquiry(),
            'standard_id' => $row['standard'],
            'batch_id' => $row['batch'],
            'inquiry_source_id' => $row['source'],
            'inquiry_status_id' => $row['status'],
            'inquiry_date' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['inquiry_date'])),
            'assigned_to' => $row['assigned_to'],
            'student_name' => $row['student_name'],
            'student_gender' => $row['gender'],
            'student_dob' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_of_birth'])),
            'address' => $row['address'],
            'contact_name' => $row['contact_name'],
            'contact_email' => $row['contact_email'],
            'contact_mobile' => $row['contact_mobile'],
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
        ];
        return Inquiry::create($input);
    }

    public function rules(): array
    {
        return [
            'student_name' => 'required',
            'student_gender' => 'required',
            'student_dob' => 'required',
            'contact_name' => 'required',
            'contact_email' => 'required',
            'contact_mobile' => 'required',
            /*'email' => 'required',
            '*.email' => 'required',
            'mobile' => 'required',
            '*.mobile' => 'required',*/
        ];
    }
}
