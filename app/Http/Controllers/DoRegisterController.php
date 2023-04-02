<?php

namespace App\Http\Controllers;

use App\Http\Requests\userStoreRequest;
use App\Models\User;
use App\Services\DoRegisterMessageProxy;
use App\Services\UserAvatarUploader;
use App\Services\UserAvatarUploaderProxy;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;


class DoRegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(
        userStoreRequest $request , UserAvatarUploaderProxy $avatarUploader ,
        DoRegisterMessageProxy $messageProxy
    ):RedirectResponse
    {
        $avatar = $avatarUploader->upload($request->file('avatar'));
        $formData = $request->only(['name','email','username']);
        $data = array_merge($formData,[
            'password'=> Hash::make($request->get('password')) ,
            'user_id' => $request->get('username') ,
            'avatar' => $avatar , 'created_at' => Carbon::now() ,
            'email_verified_at' => Carbon::now()->addSecond(rand(75,400))
        ]);
        $created = User::create($data);
        $message = $messageProxy->get($created,$request->name);
        return redirect()->route('home')->with($message['key'],[$message['value']]);
    }
}
