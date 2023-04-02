<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\AuthenticateChecker;
use App\Services\RedirectToLogin;
use App\Services\ShouldAuthenticated;
use App\Services\UserAreaDataRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;

class UserAreaController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(
        Request $request ,
        User $user ,
        UserAreaDataRepository $dataRepository ,
        AuthenticateChecker $authenticateChecker
    ):View|RedirectResponse
    {
        if (!$authenticateChecker->isAuthenticated($user))
            return RedirectToLogin::redirect();
        $userId = session()->get('user_id');
        $data = $dataRepository->getData($user , $userId);
        return view('pages.user-area',$data);
    }
}
