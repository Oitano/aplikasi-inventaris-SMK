<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class UpdateCommodityInRequest extends FormRequest {
 protected $errorBag='update';
 public function authorize():bool{return true;}
 public function rules():array{return ['date'=>'required|date','quantity'=>'required|integer|min:1','source'=>'nullable|string|max:255','store_name'=>'nullable|string|max:255','store_phone'=>'nullable|string|max:20','price'=>'nullable|integer|min:0','note'=>'nullable|string|max:1000'];}
}