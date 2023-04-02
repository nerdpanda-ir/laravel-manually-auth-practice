<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Rules\NoExistsRule;
use App\Services\AuthenticateChecker;
use Illuminate\Foundation\Http\FormRequest;

class userStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(User $user , AuthenticateChecker $authenticateChecker): bool
    {
        return !$authenticateChecker->isAuthenticated($user);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(User $user): array
    {
        $noExistEmailRule = new NoExistsRule('email',$user);
        $noExistUserNameRule = new NoExistsRule('user_id',$user);
        return [
            'name'=> 'required|min:3|max:32' ,
            'email'=> [ 'required','min:6' ,'max:64' ,'email', $noExistEmailRule ] ,
            'username'=> ['required','min:3','max:42' , $noExistUserNameRule ] ,
            'password'=> 'required|min:12|confirmed' ,
            'password_confirmation'=> 'required' ,
            'avatar'=> 'file|image|max:1024' ,
        ];
    }
    public function messages()
    {
        $nameMessages = [
            'name.required' => 'نام الزامی میباشد ' ,
            'name.min' => 'حداقل نام باید :min کاراکتر باشد ' ,
            'name.max' => ' حداکثر نام باید :max کاراکتر باشد' ,
        ];
        $emailMessages = [
            'email.required' => 'ایمیل الزامی میباشد'  ,
            'email.min' => 'ایمیل باید حداقل :min کاراکتر باشد '  ,
            'email.max' => 'ایمیل باید حد اکثر :max کاراکتر باشد '  ,
            'email.email' => 'فورمت وارد شده شبیه ایمیل نیست '  ,
            'email.'.NoExistsRule::class => 'شما نمیتوانید از این ایمیل استفاده کنید'
        ];
        $userNameMessages = [
            'username.required'=> 'نام کاربری الزامی میباشد',
            'username.min:3' => 'نام کاربری باید حداقل :min کاراکتر باشد ',
            'username.max:42' => 'نام کاربری باید حداکثر :max کاراکتر باشد' ,
            'username.'.NoExistsRule::class => 'شما نمیتوانید از این نام کاربری استفاده کنید'
        ];
        $passwordMessages  = [
            'password.required' => 'پسورد الزامی میباشد ' ,
            'password.min' => 'پسورد باید حداقل :min کاراکتر باشد  ' ,
            'password.confirmed' => 'فیلد پسورد با فیلد تکرار پسورد برابر نیست  ' ,
        ];
        $passwordConfirmationMessages = [
            'password_confirmation.required' => 'فیلد تکرار پسورد الزامی میباشد' ,
        ];
        $avatarMessages = [
            'avatar.file' => 'آواتار حتما باید از نوع فایل باشد' ,
            'avatar.image' => 'فایل انتخابی حتما باید از نوع عکس باشد' ,
            'avatar.max' => 'حداکثر سایز آواتار باید :max کیلوبایت باشد' ,
        ];

        return array_merge(
            $nameMessages,$emailMessages , $userNameMessages , $passwordMessages ,
            $passwordConfirmationMessages , $avatarMessages
        );
    }
}
