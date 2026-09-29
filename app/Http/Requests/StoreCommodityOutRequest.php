<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommodityOutRequest extends FormRequest
{
    protected $errorBag = 'store';
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'commodity_id' => ['required', 'exists:commodities,id'],
            'date' => ['required', 'date'],
            'quantity' => ['required', 'integer', 'min:1'],
            'destination' => ['nullable', 'string', 'max:255'],
            'responsible_person' => ['nullable','string','max:255'],
            'commodity_location_id' => ['nullable','exists:commodity_locations,id'],
            'note' => ['nullable', 'string', 'max:1000'],
        ];
    }
}
