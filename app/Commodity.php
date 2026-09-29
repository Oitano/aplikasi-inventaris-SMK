<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Number;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commodity extends Model
{
    use HasFactory, SoftDeletes;

    public const UNITS = [
        'Unit', 'Buah', 'Paket', 'Set', 'Rim', 'Box', 'Lusin', 'Meter', 'Liter', 'Kilogram', 'Lainnya'
    ];

    public const CATEGORIES = [
        'Elektronik', 'Furniture', 'Alat Tulis', 'Peralatan Kelas',
        'Peralatan Asrama', 'Komputer', 'Jaringan', 'Lainnya'
    ];

    public const STATUSES = [
        'Tersedia', 'Dipinjam', 'Digunakan', 'Hilang', 'Dihapus'
    ];

    protected $guarded = [];

    protected $casts = [
        'condition' => 'integer',
        'quantity' => 'integer',
        'year_of_purchase' => 'integer',
        'price' => 'integer',
        'price_per_item' => 'integer',
    ];

    public function getStatusBadgeClass(): string
    {
        return match ($this->status) {
            'Tersedia' => 'success',
            'Dipinjam' => 'warning',
            'Digunakan' => 'info',
            'Hilang' => 'danger',
            default => 'secondary',
        };
    }

    /**
     * Get the commodity location associated with the commodity.
     */
    public function commodity_location()
    {
        return $this->belongsTo(CommodityLocation::class);
    }

    /**
     * Get the commodity acquisition associated with the commodity.
     */
    public function commodity_acquisition()
    {
        return $this->belongsTo(CommodityAcquisition::class);
    }

    /**
     * Get the incoming stock history.
     */
    public function commodity_ins()
    {
        return $this->hasMany(CommodityIn::class);
    }

    /**
     * Get the outgoing stock history.
     */
    public function commodity_outs()
    {
        return $this->hasMany(CommodityOut::class);
    }

    /**
     * Get the borrowing history.
     */
    public function commodity_loans()
    {
        return $this->hasMany(CommodityLoan::class);
    }

    /**
     * Format a date value to Indonesian date format (dd-mm-yyyy).
     */
    public function indonesian_format_date($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    /**
     * Format a currency value to Indonesian currency format.
     */
    public function indonesian_currency($value)
    {
        return Number::format($value, 2);
    }

    /**
     * Get the name of the condition based on the condition code.
     */
    public function getConditionName()
    {
        return match ($this->condition) {
            1 => 'Baik',
            2 => 'Rusak Ringan',
            3 => 'Rusak Berat',
            default => null
        };
    }
}
