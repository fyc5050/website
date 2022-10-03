<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasUuidColumn
{
    protected static string $uuidColumn = 'uuid';

    public static function bootHasUuidColumn()
    {
        static::creating(function (Model $model) {
            if (empty($model->{static::$uuidColumn})) {
                $model->{static::$uuidColumn} = Str::uuid()->toString();
            }
        });
    }
}
