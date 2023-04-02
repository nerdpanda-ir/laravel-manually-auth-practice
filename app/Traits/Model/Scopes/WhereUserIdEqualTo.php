<?php

namespace App\Traits\Model\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait WhereUserIdEqualTo
{
    public function scopeWhereUserIdEqualTo(Builder $query , string $userId):void {
        $query->where('user_id','=',$userId);
    }
}
