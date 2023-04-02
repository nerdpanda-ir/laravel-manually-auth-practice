<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoLoginRequest;
use App\Models\User;
use App\Services\DoLoginDataRepository;
use App\Services\FailLoginMessageBuilder;
use App\Services\FailLoginResponseBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoLoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(
        DoLoginRequest $request ,
        DoLoginDataRepository $dataRepository ,
        User $userModel
    )
    {
        $user = $dataRepository->getData($userModel,$request->username);

        if (is_null($user))
            return FailLoginResponseBuilder::build($request->only('username'));

        $passwordCheck = Hash::check($request->password , $user->password);

        if (!$passwordCheck)
            return FailLoginResponseBuilder::build($request->only('username'));

        session()->put('user_id',$user->id);

        \Log::alert('user loged in ',[
            'user_id' => $request->username , 'ip' => $request->ip()
        ]);

        return redirect()->route('user-area')
               ->with('system.messages.ok',["welcome back {$request->username}"]);
    }
}
