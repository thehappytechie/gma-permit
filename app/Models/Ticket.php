<?php

namespace App\Models;

use App\Observers\ModelHashIdObserver;
use App\Http\Traits\UsesHashIds;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Audit;
use ReflectionClass;
use OwenIt\Auditing\Contracts\Auditable;

class Ticket extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use UsesHashIds;
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
