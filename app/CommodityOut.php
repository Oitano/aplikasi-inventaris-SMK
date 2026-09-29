<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class CommodityOut extends Model {
    use HasFactory;
    protected $table='commodity_outs'; protected $guarded=[]; protected $casts=['date'=>'date'];
    public function commodity(){return $this->belongsTo(Commodity::class);}
    public function user(){return $this->belongsTo(User::class);}
    public function location(){return $this->belongsTo(CommodityLocation::class,'commodity_location_id');}
}