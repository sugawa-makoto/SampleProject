<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
// これを付け加えたら遷移が自由にできるようになった
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // 認証後のリダイレクト先
    // 認証後のリダイレクト先

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // ログインしたら遷移するリダイレクト先（上の// 認証後のリダイレクト先より優先されます）
    protected function redirectTo()
    {
        return '/stamp';
    }
    // ログアウトしたら遷移するリダイレクト先
    protected function loggedOut(Request $request)
    {
        return redirect('/top');
    }
}
