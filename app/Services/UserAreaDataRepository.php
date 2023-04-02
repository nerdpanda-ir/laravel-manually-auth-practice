<?php

namespace App\Services;

use App\Models\User;

class UserAreaDataRepository
{
    public function getData(User $user , int $user_id):array {
        $title = 'user area';
        $loggedInUser = $user->find($user_id,['name','avatar']);
        return compact('title','loggedInUser');
    }
}
