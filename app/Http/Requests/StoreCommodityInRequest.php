<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommodityInRequest extends FormRequest
{
    protected $errorBag = 'store';
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'commodity_id' => ['required', 'exists:commodities,id'],
            'date' => ['required', 'date'],
            'quantity' => ['required', 'integer', 'min:1'],
            'source' => ['nullable', 'string', 'max:255'],
            'store_name' => ['nullable','string','max:255'],
            'store_phone' => ['nullable','string','max:20'],
            'price' => ['nullable','integer','min:0'],
            'receipt' => ['nullable','file','mimes:jpg,jpeg,png,pdf','max:2048'],
            'note' => ['nullable', 'string', 'max:1000'],
        ];
    }
}
