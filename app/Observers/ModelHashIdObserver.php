<?php

namespace App\Observers;

use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Database\Eloquent\Model;

class ModelHashIdObserver
{
    public function created(Model $model)
    {
        $model->update([
            'hash_id' => $model->getHashShortName() . '_' . Hashids::encode($model->id),
        ]);
    }
}
