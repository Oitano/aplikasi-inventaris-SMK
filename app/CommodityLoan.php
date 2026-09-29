<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommodityLoan extends Model {
    use HasFactory;
    protected $table='commodity_loans';
    protected $guarded=[];
    protected $casts=[
        'loan_date'=>'date','due_date'=>'date','return_date'=>'date','approved_at'=>'datetime',
    ];
    public const STATUSES=['Menunggu','Disetujui','Dipinjam','Dikembalikan','Terlambat','Ditolak','Bermasalah'];
    public function commodity(){ return $this->belongsTo(Commodity::class); }
    public function user(){ return $this->belongsTo(User::class); }
    public function approver(){ return $this->belongsTo(User::class,'approved_by'); }
    public function getEffectiveStatusAttribute(): string {
        if (!$this->return_date && $this->due_date && $this->due_date->isPast() && in_array($this->status,['Disetujui','Dipinjam'])) return 'Terlambat';
        return $this->status;
    }
}