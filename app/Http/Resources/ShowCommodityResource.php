<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowCommodityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'commodity_acquisition_id' => $this->commodity_acquisition_id,
            'commodity_acquisition' => $this->commodity_acquisition,
            'commodity_location_id' => $this->commodity_location_id,
            'commodity_location' => $this->commodity_location,
            'item_code' => $this->item_code,
            'inventory_number' => $this->inventory_number,
            'category' => $this->category,
            'unit' => $this->unit,
            'status' => $this->status,
            'photo' => $this->photo,
            'name' => $this->name,
            'material' => $this->material,
            'brand' => $this->brand,
            'year_of_purchase' => $this->year_of_purchase,
            'condition' => $this->condition,
            'condition_name' => $this->getConditionName(),
            'quantity' => $this->quantity,
            'price' => $this->price,
            'price_formatted' => $this->indonesian_currency($this->price),
            'price_per_item' => $this->price_per_item,
            'price_per_item_formatted' => $this->indonesian_currency($this->price_per_item),
           'note' => $this->note,

            'input_date' => $this->input_date,
            'store_name' => $this->store_name,
            'store_address' => $this->store_address,
            'store_phone' => $this->store_phone,
            'receipt' => $this->receipt,
        ];
    }
}
