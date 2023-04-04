<?php

namespace App\Models;

use App\Http\Traits\UsesHashIds;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;

class Category extends Model implements Auditable
{
    use UsesHashIds;
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    protected $guarded = ['id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
