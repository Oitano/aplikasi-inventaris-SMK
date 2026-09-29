<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Sanction extends Model {
    protected $guarded = [];
    protected $casts = ['date'=>'date'];
    public function user(){ return $this->belongsTo(User::class); }
    public function loan(){ return $this->belongsTo(CommodityLoan::class,'commodity_loan_id'); }
    public function commodity(){ return $this->belongsTo(Commodity::class); }
    public function creator(){ return $this->belongsTo(User::class,'created_by'); }
}