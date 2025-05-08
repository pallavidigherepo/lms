<?php

namespace App\Exports;

use App\Http\Resources\FeeStructureResource;
use App\Http\Resources\FeeTransactionResource;
use App\Models\FeeTransaction;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class FeeTransactionExport implements
    WithMapping,
    Responsable,
    ShouldAutoSize,
    WithHeadings,
    WithEvents,
    FromCollection,
    WithDrawings
{
    use Exportable;


    public function __construct(int $transaction)
    {
        $this->id = $transaction;
    }
    /**
    * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function collection()
    {
        return FeeTransactionResource::collection(FeeTransaction::all()->where('id', $this->id));
    }

    public function map($transaction): array
    {
        return [
            $transaction->id,
            $transaction->amount,
            $transaction->fee_id,
        ];
    }


    public function headings(): array {
        return [
            '#',
            'Invoice id',
            'Amount',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:C1')->applyFromArray([
                    'font'=> [
                        'bold' => true,
                    ],
                ]);
            }
        ];
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/storage/images/logo.jpg'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('A1');

        return $drawing;
    }
}
