<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\AuthenticateChecker;
use App\Services\RedirectToLogin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LogOutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(
        Request $request , User $user ,
        AuthenticateChecker $authenticateChecker
    ):RedirectResponse {
        if (!$authenticateChecker->isAuthenticated($user))
            return RedirectToLogin::redirect();
        $user_id = session()->get('user_id');
        $logedInUser = $user->find($user_id,['name']);
        session()->remove('user_id');
        return redirect()->route('home')
               ->with(
                   'system.messages.ok',
                   ["{$logedInUser->name} youre successfully loged out !!!"]
               );
    }
}
