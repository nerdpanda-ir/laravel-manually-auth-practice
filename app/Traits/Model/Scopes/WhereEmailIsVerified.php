<?php

namespace App\Traits\Model\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait WhereEmailIsVerified
{
    public function scopeWhereEmailIsVerified(Builder $query,string $column = 'email_verified_at'):void {
        $query->whereNotNull($column);
    }
}
