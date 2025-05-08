<?php

namespace App\Exports;

use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromCollection;

class CourseExport implements 
                    WithMapping,
                    Responsable, 
                    ShouldAutoSize, 
                    WithHeadings, 
                    WithEvents,
                    FromCollection
{
    use Exportable;
    
    public function collection()
    {
        return CourseResource::collection(Course::all());
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    /*public function query()
    {
        return Course::query();
    }*/

    public function map($course): array 
    {
        return [
            $course->id,
            $course->courses_types->pluck('id'),
            $course->course_code,
            $course->name,
            //'tags' => $this->tags,
            $course->tags->pluck('name'),
            $course->language_id,
            $course->created_at,

            // $course->id,
            // $course->courses_types->pluck('id'),
            // $course->course_code,
            // $course->name,
            // $course->tags->pluck('id'),
            // $course->language_id,
            // $course->created_at,
        ];
    }

    public function headings(): array {
        return [
            '#',
            'Course Types',
            'Course Code',
            'Name',
            'Tags',
            'Language Id',
            'Created At'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:F1')->applyFromArray([
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
