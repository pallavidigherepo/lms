<?php

namespace App\Exports;

use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use phpDocumentor\Reflection\Types\Void_;

class StudentExport implements
                        WithMapping,
                        Responsable,
                        ShouldAutoSize,
                        WithHeadings,
                        WithEvents,
                        FromCollection
{
    use Exportable;

    /**
     * @var bool
     */
    private $isDemo;

    /**
     * @param int $question
     * @param bool $demo
     */
    public function __construct(bool $demo = false)
    {
        $this->isDemo = $demo;
    }

    /**
    * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function collection()
    {
        if ($this->isDemo) {
            return Student::factory()->count(1)->make();
        }
        return StudentResource::collection(Student::all());
    }

    public function map($student): array
    {
        if ($this->isDemo) {
            return array();
        }
        return [
            $student->id,
            $student->name,
            $student->enrollment_number,
            $student->enrollment_number,
            $student->standard->name,
            $student->batch_id,
            $student->student_fee_type,
            $student->aadhaar,
            $student->gender,
            $student->dob,
            $student->caste,
            $student->caste,
            $student->blood_group,
            $student->medical_notes,
            $student->religion,
            $student->mother_tongue_language,
            $student->interests,
            $student->permanent_address,
            $student->address,
            $student->student_parent->parent_aadhaar_number,
            $student->student_parent->mother_name,
            $student->student_parent->mother_email,
            $student->student_parent->mother_mobile,
            $student->student_parent->mother_qualification,
            $student->student_parent->mother_occupation,
            $student->student_parent->father_name,
            $student->student_parent->father_email,
            $student->student_parent->father_mobile,
            $student->student_parent->father_qualification,
            $student->student_parent->father_occupation,
            $student->created_at,
        ];
    }

    public function headings(): array {
        if ($this->isDemo) {
            return [
                'Name',
                'Enrollment Number',
                'Discharge Number',
                'Admission Date',
                'Standard',
                'Batch',
                'Fee Type',
                'Aadhaar',
                'Gender',
                'Date of Birth',
                'Category',
                'Caste',
                'Blood Group',
                'Medical Notes',
                'Religion',
                'Mother Tongue Language',
                'Interests',
                'Permanent Address',
                'Address',
                'Parent Aadhaar Number',
                'Mother Name',
                'Mother Email',
                'Mother Mobile',
                'Mother Qualification',
                'Mother Occupation',
                'Father Name',
                'Father Email',
                'Father Mobile',
                'Father Qualification',
                'Father Occupation',
            ];
        }
        return [
            '#',
            'Name',
            'Enrollment Number',
            'Discharge Number',
            'Admission Date',
            'Standard',
            'Batch',
            'Fee Type',
            'Aadhaar',
            'Gender',
            'Date of Birth',
            'Category',
            'Caste',
            'Blood Group',
            'Medical Notes',
            'Religion',
            'Mother Tongue Language',
            'Interests',
            'Permanent Address',
            'Address',
            'Parent Aadhaar Number',
            'Mother Name',
            'Mother Email',
            'Mother Mobile',
            'Mother Qualification',
            'Mother Occupation',
            'Father Name',
            'Father Email',
            'Father Mobile',
            'Father Qualification',
            'Father Occupation',
            'Created At'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:AD1')->applyFromArray([
                    'font'=> [
                        'bold' => true,
                    ],
                    /*'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                            'color' => ['argb' => 'FFFF0000'],
                        ],
                    ]*/
                ]);
            }
        ];
    }
}
