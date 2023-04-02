<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\Model\DisableTimeStampTrait;
use App\Traits\Model\Scopes\RecentlyUserRegesteredScope;
use App\Traits\Model\Scopes\WhereEmailIsVerified;
use App\Traits\Model\Scopes\WhereUserIdEqualTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , WhereEmailIsVerified ;
    use RecentlyUserRegesteredScope , DisableTimeStampTrait , WhereUserIdEqualTo;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'user_id' ,
        'password',
        'email_verified_at' ,
        'avatar' ,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
