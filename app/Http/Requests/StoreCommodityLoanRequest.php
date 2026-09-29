<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use App\CommodityLoan;
class StoreCommodityLoanRequest extends FormRequest {
    protected $errorBag='store';
    public function authorize():bool{return true;}
    public function rules():array{
        $student=auth()->user()?->isStudent();
        return [
            'commodity_id'=>['required','exists:commodities,id'],
            'loan_date'=>['required','date'],
            'due_date'=>['required','date','after_or_equal:loan_date'],
            'quantity'=>['required','integer','min:1'],
            'borrower'=>$student?['nullable','string','max:255']:['required','string','max:255'],
            'purpose'=>['required','string','max:1000'],
            'borrowed_condition'=>['nullable','string','max:50'],
            'note'=>['nullable','string','max:1000'],
        ];
    }
}