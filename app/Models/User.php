<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Rappasoft\LaravelAuthenticationLog\Traits\AuthenticationLoggable;

class User extends Authenticatable implements MustVerifyEmail, Auditable
{
    use SoftDeletes;
    use HasRoles;
    use HasApiTokens, HasFactory, Notifiable, TwoFactorAuthenticatable, AuthenticationLoggable;
    use \App\Http\Traits\UsesUuid;
    use \OwenIt\Auditing\Auditable;

    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    protected $guarded = ['id'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function setPasswordAttribute($value)
    {
        if (!empty($value)) {
            if (preg_match('/^\$2y\$[0-9]*\$.{50,}$/', $value)) {
                $this->attributes['password'] = $value;
            } else {
                $this->attributes['password'] = Hash::make($value);
            }
            return true;
        }
        return false;
    }

    public function isProfileOwner()
    {
        return $this->id == Auth::user()->id;
    }

    /**
     * Get all of the applicants for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function applicants()
    {
        return $this->hasMany(Applicant::class, 'doctor_id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'user_id');
    }

    public function uploads()
    {
        return $this->hasMany(Upload::class, 'user_id');
    }
}
