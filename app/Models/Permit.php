<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Permit extends Model implements  Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
        'new_values' => 'array'
    ];

    protected $guarded = ['id'];


    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function permitUnit()
    {
        return $this->belongsTo(PermitUnit::class, 'permit_unit_id');
    }

}
