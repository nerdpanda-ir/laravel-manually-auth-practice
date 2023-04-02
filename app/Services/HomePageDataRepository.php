<?php

namespace App\Services;

use App\Models\User;

class HomePageDataRepository
{
    protected AuthenticateChecker $authChecker;
    public function __construct(AuthenticateChecker $authChecker)
    {
        $this->authChecker = $authChecker ;
    }

    public function getData(User $user):array {
        $title = 'Home Page';
        $recentlyRegesteredUsers = $user->RecentlyUserRegistered()
                                        ->offset(0)
                                        ->limit(5)
                                        ->get(['name','avatar']);

        $userIsLogedIn = $this->authChecker->isAuthenticated($user);
        $data = [
            'title' => $title ,
            'recentlyUsers' => $recentlyRegesteredUsers ,
            'userIsLogedIn' => $userIsLogedIn
        ];
        if ($userIsLogedIn)
            $data['logedInUser'] = $user->find(session()->get('user_id'),['name','avatar']);
        return $data;
    }
}
