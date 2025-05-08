<?php

namespace App\Imports;

use App\Models\FeeType;
use App\Models\Standard;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Date;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\Importable;


class StudentImport implements
    ToModel,
    WithHeadingRow,
    WithValidation,
    SkipsOnError,
    SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;

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
     * @param \Throwable $e
     */
    /*public function onError(\Throwable $e)
    {
        // Handle the exception how you'd like.
    }*/

    public function onFailure(Failure ...$failures)
    {
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     * @throws \Exception
     */
    public function model(array $row)
    {
        $standard = Standard::where('name', 'like', '%' . $row['standard'] . '%')->first();
        $feeType = FeeType::where('name', 'like', '%' . $row['fee_type'] . '%')->first();
        $input = [
            'name' => $row['name'],
            'enrollment_number' => $row['enrollment_number'],
            'transfer_number' => $row['discharge_number'],
            'aadhaar' => $row['aadhaar'],
            'gender' => $row['gender'],
            'admission_date' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['admission_date'])),
            'dob' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_of_birth'])),
            'permanent_address' => $row['permanent_address'],
            'address' => $row['address'],
            'blood_group' => $row['blood_group'],
            'medical_notes' => $row['medical_notes'],
            'category' => $row['category'],
            'caste' => $row['caste'],
            'religion' => $row['religion'],
            'mother_tongue_language' => $row['mother_tongue_language'],
            'interests' => $row['interests'],
            'parent_aadhaar_number' => $row['parent_aadhaar_number'],
            'mother_name' => $row['mother_name'],
            'mother_email' => $row['mother_email'],
            'mother_mobile' => $row['mother_mobile'],
            'mother_qualification' => $row['mother_qualification'],
            'mother_occupation' => $row['mother_occupation'],
            'father_name' => $row['father_name'],
            'father_email' => $row['father_email'],
            'father_mobile' => $row['father_mobile'],
            'father_qualification' => $row['father_qualification'],
            'father_occupation' => $row['father_occupation'],
            //'parent_email' => $row['parent_email'],
            'parent_password' => Hash::make(123456789),
            //'board_id' => $row['board'],
            'standard_id' => $standard->id,
            //'language_id' => $row['language'],
            //'course_id' => $row['course'],
            'batch_id' => $row['batch'],
            'fee_type_id' => $feeType->id,
        ];
        $student = Student::create($input);
        $student->save();
        return $student;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'aadhaar' => 'required|unique:students',
            '*.aadhaar' => 'required|unique:students',
            /*'mobile' => 'required',
            '*.mobile' => 'required',*/
        ];
    }
}
