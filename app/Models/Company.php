<?php

namespace App\Models;

use App\Http\Traits\UsesHashIds;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;

class Company extends Model implements Auditable
{
    use UsesHashIds;
    use HasFactory;
    use \OwenIt\Auditing\Auditable;


    protected $guarded = ['id'];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function permits()
    {
        return $this->hasMany(Permit::class);
    }
}
