<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */

    public function showLoginForm()
    {
            return view('frontend.pages.login');
    }

    public function login(LoginRequest $request)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'role' => 0
        ];
        if(Auth::attempt($login)){
                return redirect('user/profile');
        } else {
            return redirect()->back()->with('notification', 'Please re-enter password');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

     /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    function authenticated(Request $request, $user)
    {
    if ( !$user->active ) {
        auth()->logout();
        return back()->withErrors(['email' => 'Your account is not activated yet, please verify your Account.']);
    }

    return redirect()->intended($this->redirectPath());
}
}
