<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class UpdateCommodityLoanRequest extends FormRequest {
 public function authorize():bool{return true;}
 public function rules():array{return ['due_date'=>'required|date|after_or_equal:loan_date','purpose'=>'required|string|max:1000','borrowed_condition'=>'nullable|string|max:50','note'=>'nullable|string|max:1000'];}
}