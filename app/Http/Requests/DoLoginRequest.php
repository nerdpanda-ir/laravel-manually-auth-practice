<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Services\AuthenticateChecker;
use Illuminate\Foundation\Http\FormRequest;

class DoLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(AuthenticateChecker $checker , User $user): bool
    {
        return !$checker->isAuthenticated($user);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'username'=> ['required','min:3','max:42' ] ,
            'password' => 'required|min:12'
        ];
    }
    public function messages()
    {
        $userNameMessages = [
            'username.required'=> 'نام کاربری الزامی میباشد',
            'username.min:3' => 'نام کاربری باید حداقل :min کاراکتر باشد ',
            'username.max:42' => 'نام کاربری باید حداکثر :max کاراکتر باشد' ,
        ];
        $passwordMessages  = [
            'password.required' => 'پسورد الزامی میباشد ' ,
            'password.min' => 'پسورد باید حداقل :min کاراکتر باشد  ' ,
        ];
        return array_merge($userNameMessages , $passwordMessages);
    }
}
