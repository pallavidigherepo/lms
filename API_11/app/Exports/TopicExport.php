<?php

namespace App\Exports;

use App\Models\Topic;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromCollection;

class TopicExport implements 
                                WithMapping,
                                Responsable, 
                                ShouldAutoSize, 
                                WithHeadings, 
                                WithEvents,
                                FromQuery
{
    use Exportable;
    private $isDemo;

    public function __construct(int $chapter, bool $demo = false)
    {
        $this->parent_id = $chapter;
        $this->isDemo = $demo;
    }

    public function query()
    {
        if ($this->isDemo) {
            return Topic::factory()->count(3)->make();
        }
        return Topic::query()->where('parent_id', "=", $this->parent_id);
    }

    public function map($topic): array 
    {
        if ($this->isDemo) {
            return [
                $topic->chapter,
                $topic->label,
                $topic->description,
                $topic->icon,
                implode(',', $topic->tags),
                $topic->language,            ];
        }
        return [
            $topic->id,
            json_decode($topic->chapter->label),
            json_decode($topic->label),
            json_decode($topic->description),
            $topic->icon,
            $topic->tags->pluck('name'),
            $topic->language_id,
            $topic->created_at,
        ];
    }

    public function headings(): array {
        if ($this->isDemo) {
            return [
                'Chapter',
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
