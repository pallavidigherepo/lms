<?php

namespace App\Exports;

use App\Models\Inquiry;
use App\Http\Resources\InquiryResource;
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

class InquiryExport implements
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
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if ($this->isDemo) {
            return Inquiry::factory()->count(1)->make();
        }
        return InquiryResource::collection(Inquiry::all());
    }

    public function map($row): array
    {
        if ($this->isDemo) {
            return array();
        }
        return [
            $row->id,
            $row->standard->name,
            $row->batch->name,
            $row->source->name,
            $row->status->name,
            $row->inquiry_date,
            $row->assigned->name,
            $row->student_name,
            $row->contact_name,
            $row->contact_email,
            $row->contact_mobile,
            $row->student_gender,
            $row->student_dob,
            $row->address,
            $row->created_at,
        ];
    }

    public function headings(): array {
        if ($this->isDemo) {
            return [
                'Standard',
                'Batch',
                'Source',
                'Status',
                'Inquiry Date',
                'Assigned To',
                'Student Name',
                'Contact Name',
                'Contact Email',
                'Contact Mobile',
                'Gender',
                'Date of Birth',
                'Address',
            ];
        }
        return [
            '#',
            'Standard',
            'Batch',
            'Source',
            'Status',
            'Inquiry Date',
            'Assigned To',
            'Student Name',
            'Contact Name',
            'Contact Email',
            'Contact Mobile',
            'Gender',
            'Date of Birth',
            'Address',
            'Created At'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:Z1')->applyFromArray([
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
