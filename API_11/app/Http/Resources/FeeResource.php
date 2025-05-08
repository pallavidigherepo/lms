<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'student_id' => $this->student_id,
            'student' => $this->student->name ?? $this->student_id,
            'standard_id' => $this->standard_id,
            'standard' => $this->standard->name ?? $this->standard_id,
            'batch_id' => $this->batch_id,
            'batch' => $this->batch->name ?? $this->batch_id,
            'fee_type_id' => $this->fee_type_id,
            'fee_type' => $this->fee_type->name ?? $this->fee_type_id,
            'total_amount' => $this->total_amount,
            'amount_to_pay' => $this->amount_to_pay,
            'balance' => $this->balance,
            'status' => $this->balance === 0 ? 'Paid': 'Un-Paid',
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
