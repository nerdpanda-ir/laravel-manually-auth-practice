<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\AuthenticateChecker;
use App\Services\RedirectToUserArea;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(
        Request $request , AuthenticateChecker $checker , User $user
    ):View|RedirectResponse
    {
        if ($checker->isAuthenticated($user))
            return RedirectToUserArea::redirect();
        return \view('pages.login');
    }
}
