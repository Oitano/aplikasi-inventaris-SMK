<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
    ];

    public function loans()
    {
        return $this->hasMany(CommodityLoan::class);
    }

    public function sanctions()
    {
        return $this->hasMany(Sanction::class);
    }

    public function auditLogs()
    {
        return $this->hasMany(AuditLog::class);
    }

    public function isActive(): bool
    {
        return ($this->status ?? 'Aktif') === 'Aktif';
    }

    public function isAdministrator(): bool { return $this->hasRole('Administrator'); }
    public function isStaff(): bool { return $this->hasRole('Staff TU (Tata Usaha)'); }
    public function isStudent(): bool { return $this->hasRole('Siswa'); }

    public function diffForHumanDate($value)
    {
        return Carbon::now()->createFromTimestamp(strtotime($value))->diffForHumans();
    }
}
