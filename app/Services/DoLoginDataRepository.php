<?php

namespace App\Services;

use App\Models\User;

class DoLoginDataRepository
{
    public function getData(User $user,$userID):null|User {
        $data = $user->whereUserIdEqualTo($userID)->first(['id','password','name']);
        return $data;
    }
}
