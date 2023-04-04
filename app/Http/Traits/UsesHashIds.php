<?php

namespace App\Http\Traits;

use ReflectionClass;
use Illuminate\Support\Str;
use App\Observers\ModelHashIdObserver;

trait UsesHashIds

{
    public static function bootUsesHashIds()
    {
        static::observe(new ModelHashIdObserver());
    }

    public function getRouteKeyName()
    {
        return 'hash_id';
    }

    public function getId()
    {
        return $this->hash_id;
    }

    public function getHashShortName()
    {
        return strtolower(Str::limit((new ReflectionClass($this))->getShortName(), 12, ''));
    }
}
