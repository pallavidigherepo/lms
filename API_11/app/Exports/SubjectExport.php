<?php

namespace App\Exports;

use App\Http\Resources\SubjectResource;
use App\Models\Subject;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromCollection;

class SubjectExport implements
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
            return Subject::factory()->count(3)->make();
        }
        return SubjectResource::collection(Subject::all());
    }


    public function map($subject): array
    {
        if ($this->isDemo) {
            return array();
        }
        return [
            $subject->id,
            json_decode($subject->label),
            json_decode($subject->description),
            //$subject->board_id,
            $subject->standard_id,
            $subject->icon,
            $subject->tags->pluck('name'),
            //$subject->language_id,
            $subject->created_at,
        ];
    }

    public function headings(): array {
        if ($this->isDemo) {
            return [
                'Standard',
                'Label',
                'Description',
                //'Board',
                'Icon',
                'Tags',
                //'Language Id',
            ];
        }
        return [
            '#',
            'Standard',
            'Label',
            'Description',
            //'Board',
            'Icon',
            'Tags',
            //'Language Id',
            'Created At'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:G1')->applyFromArray([
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
