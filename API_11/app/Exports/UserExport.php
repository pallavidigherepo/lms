<?php

namespace App\Exports;

use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

use App\Http\Resources\UserResource;
use App\Models\User;

/**
 *
 */
class UserExport implements
            FromCollection,
            Responsable,
            ShouldAutoSize,
            WithMapping,
            WithHeadings,
            WithEvents
{
    use Exportable;

    /**
     * @var bool
     */
    private $isDemo;

    /**
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
            return User::factory()->count(1)->make();
        }
        return new UserResource(User::all());
    }

    /**
     * @param $user
     * @return array
     */
    public function map($user): array
    {
        if ($this->isDemo) {
            return [
                $user->name,
                $user->email,
                $user->mobile,
                $user->designation,
            ];
        }
        return [
            $user->id,
            $user->name,
            $user->email,
            $user->profile_user->mobile,
            $user->profile_user->designation,
            $user->created_at,
        ];
    }

    /**
     * @return string[]
     */
    public function headings(): array {
        if ($this->isDemo) {
            return [
                'Name',
                'Email',
                'Mobile',
                'Designation',
            ];
        }
        return [
            '#',
            'Name',
            'Email',
            'Mobile',
            'Designation',
            'Created At'
        ];

    }

    /**
     * @return \Closure[]
     */
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
