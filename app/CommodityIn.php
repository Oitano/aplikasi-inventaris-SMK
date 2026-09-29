<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class CommodityIn extends Model {
    use HasFactory;
    protected $table='commodity_ins'; protected $guarded=[]; protected $casts=['date'=>'date','price'=>'integer'];
    public function commodity(){return $this->belongsTo(Commodity::class);}
    public function user(){return $this->belongsTo(User::class);}
}