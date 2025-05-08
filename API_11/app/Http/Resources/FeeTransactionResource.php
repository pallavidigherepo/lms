<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class FeeTransactionResource extends JsonResource
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
            'amount' => $this->amount,
            'fee_id' => $this->fee_id,
            'fee' => $this->fee ?? $this->fee_id,
            'fee_structure_id' => $this->fee_structure_id,
            'parent_id' => $this->parent_id,
            'parent' => $this->parent ?? $this->parent_id,
            'payment_method' => $this->payment_method,
            'method' => ucfirst($this->payment_method),
            'uid' => $this->uid,
            'logo' => URL::to("storage/images/logo.png"),
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'created_on' => $this->created_at->format('d-m-Y'),
        ];
    }
}
