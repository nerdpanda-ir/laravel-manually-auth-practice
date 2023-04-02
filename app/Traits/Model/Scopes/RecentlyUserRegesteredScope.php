<?php

namespace App\Traits\Model\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait RecentlyUserRegesteredScope
{
    public function scopeRecentlyUserRegistered(Builder $query):void {
        $query->whereEmailIsVerified();
        $query->orderBy('created_at','desc');
        $query->orderBy('updated_at','desc');
        $query->orderBy('name','asc');
    }
}
