<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


class AdminLoginController extends Controller
{
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
            return view('admin.login');
    }

    public function login(LoginRequest $request)
    {

            $login = [
                'email' => $request->email,
                'password' => $request->password,
                'role' => 1
            ];
            if(Auth::attempt($login)){
                return redirect('admin/dash-board');
            } else {
                return redirect()->back()->with('warning', 'Your email or password wrong. Please re-enter it!');
            }

    }

    public function logout()
    {
        Auth::logout();
        return redirect('admin/login');
    }
}
