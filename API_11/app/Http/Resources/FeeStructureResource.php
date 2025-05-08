<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class FeeStructureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'amount' => $this->amount,
            'fee_category_id' => $this->fee_category_id,
            'fee_category' => $this->fee_category->name ?? $this->fee_category_id,
            'standard_id' => $this->standard_id,
            'standard' => $this->standard->name ?? $this->standard_id,
            'batch_id' => $this->batch_id,
            'batch' => $this->batch->name ?? $this->batch_id,
        ];
    }
}
