<?php

namespace App\Exports;

use App\Models\Question;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

/**
 *
 */
class QuestionExport implements
                        WithMapping,
                        Responsable,
                        ShouldAutoSize,
                        WithHeadings,
                        WithEvents,
                        FromQuery
{
    use Exportable;

    /**
     * @var bool
     */
    private $isDemo;
    /**
     * @var int
     */
    private $parent_id;


    /**
     * @param int $question
     * @param bool $demo
     */
    public function __construct(int $question, bool $demo = false)
    {
        $this->parent_id = $question;
        $this->isDemo = $demo;
    }

    /**
     * @return Builder
     */
    public function query()
    {
        if ($this->isDemo) {
            return Question::factory()->count(3)->make();
        }
        return Question::query();
    }

    /**
     * @param $row
     * @return array
     */
    public function map($row): array
    {
        print_r($row);
        return [
            $row->id,
            $row->board_id,
            $row->standard_id,
            $row->subject_id,
            $row->chapter_id,
            $row->topic_id,
            $row->difficulty_level_id,
            $row->type_id,
            $row->question,
            $row->description,
            $row->note,
            $row->marks,
            $row->negative_marks,
            $row->language_id,
            $row->created_at,
        ];
    }


    /**
     * @return string[]
     */
    public function headings(): array {
        if ($this->isDemo) {
            return [
                'Question',
                'Description',
                'Note',
                'Marks',
                'Negative Marks',
                "Expected Time",
                "Option 1",
                "Option 2",
                "Option 3",
                "Option 4",
                "Option 5",
                "Correct Answer(s)"
            ];
        }
        return [
            '#',
            'Board',
            'Standard',
            'Subject',
            'Chapter',
            'Topic',
            'Difficulty Level',
            'Type',
            'Question',
            'Description',
            'Note',
            'Marks',
            'Negative Marks',
            "Expected Time",
            'Language Id',
            'Created At',
            "Option 1",
            "Option 2",
            "Option 3",
            "Option 4",
            "Option 5",
            "Correct Answer(s)"
        ];
    }

    /**
     * @return \Closure[]
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:M1')->applyFromArray([
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
