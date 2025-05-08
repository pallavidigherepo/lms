<?php

namespace App\Exports;

use App\Models\Chapter;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromCollection;

class ChapterExport implements
                        WithMapping,
                        Responsable,
                        ShouldAutoSize,
                        WithHeadings,
                        WithEvents,
                        FromQuery
{
    use Exportable;
    private $isDemo;

    public function __construct(int $subject, bool $demo = false)
    {
        $this->parent_id = $subject;
        $this->isDemo = $demo;
    }

    public function query()
    {
        if ($this->isDemo) {
            return Chapter::factory()->count(3)->make();
        }
        return Chapter::query()->where('parent_id', "=", $this->parent_id);
    }

    public function map($chapter): array
    {
        if ($this->isDemo) {
            return [
                $chapter->subject,
                $chapter->label,
                $chapter->description,
                $chapter->icon,
                implode(',', $chapter->tags),
                $chapter->language,            ];
        }
        return [
            $chapter->id,
            json_decode($chapter->subject->label),
            json_decode($chapter->label),
            json_decode($chapter->description),
            $chapter->icon,
            $chapter->tags->pluck('name'),
            $chapter->language_id,
            $chapter->created_at,
        ];
    }

    public function headings(): array {
        if ($this->isDemo) {
            return [
                'Subject',
                'Label',
                'Description',
                'Icon',
                'Tags',
                'Language Id',
            ];
        }
        return [
            '#',
            'Subject',
            'Label',
            'Description',
            'Icon',
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
