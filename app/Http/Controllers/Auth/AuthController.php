<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Events\UserRegistered;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users',
                'regex:/@bilkent.edu.tr|@ug.bilkent.edu.tr|@ee.bilkent.edu.tr|@cs.bilkent.edu.tr|@ie.bilkent.edu.tr|@fen.bilkent.edu.tr|@ctp.bilkent.edu.tr|@alumni.bilkent.edu.tr$/i',
            ],
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = new User(array_only($data, [
            'email',
            'first_name',
            'last_name',
            'password',
            'newsletter'
        ]));

        $user->activation_key = md5(uniqid());
        $user->is_active = 0;
        $user->save();
        //
        event(new UserRegistered($user));
        return $user;
    }

    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $this->create($request->all());

        return redirect(url('/'))->withSuccess('Eposta adresinize bir aktivasyon postası gönderdik. Lütfen hem gelen kutunuzu hem de spam klasörünü kontrol edin.');
    }

    public function getActivate($key) {
        //
        $user = User::where('activation_key', $key)->firstOrFail();
        $user->is_active = 1;
        $user->activation_key = '';
        $user->save();

        return redirect(url('auth/login'))->withSuccess('Hesabınız başarıyla aktifleştirildi. Giriş yapabilirsiniz.');
    }
}
