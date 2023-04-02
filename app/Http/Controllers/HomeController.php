<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\AuthenticateChecker;
use App\Services\HomePageDataRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(
        Request $request ,  User $user ,
        HomePageDataRepository $dataRepository ,
    ):View
    {

        $data = $dataRepository->getData($user);
        return \view('pages.home',$data);
    }
}
