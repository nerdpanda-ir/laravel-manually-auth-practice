<?php

namespace App\Services;

use App\Models\User;

class AuthenticateChecker
{
    public function isAuthenticated(User $user):bool {
        if (!session()->has('user_id'))
            return false;
        $user_id = session()->get('user_id');
        $userIsExist = $user
                            ->where('id','=',$user_id)
                            ->offset(0)
                            ->limit(1)
                            ->exists();
        if ($userIsExist)
            return true;
        return false;
    }
}
