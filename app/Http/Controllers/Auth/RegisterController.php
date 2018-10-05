<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use DB;
use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return IlluminateContractsValidationValidator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed',
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
        // dd($data);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'password' => $data['password'],
        ]);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request) {
      $input = $request->all();
      $validator = $this->validator($input);
    //   dd($input);
      if ($validator->passes()){
        $user = $this->create($input)->toArray();
        $user['link'] = str_random(30);

        DB::table('user_activations')->insert(['user_id'=>$user['id'],'token'=>$user['link']]);

        Mail::send('emails.activation', $user, function($message) use ($user){
          $message->to($user['email']);
          $message->subject('Activation Code');
        });
        return redirect()->to('login')->with('warning',"We sent activation code. Please check your mail.");
      }
      return back()->with('errors',$validator->errors());
    }

    public function userActivation($token){
      $check = DB::table('user_activations')->where('token',$token)->first();
      if(!is_null($check)){
        $user = User::find($check->user_id);
        if ($user->active ==1){
          return redirect()->to('login')->with('notification',"Your account are already actived.");

        }
        $user->update(['active' => 1]);
        DB::table('user_activations')->where('token',$token)->delete();
        return redirect()->to('login')->with('notification',"Your account active successfully.");
      }
      return redirect()->to('login')->with('warning',"Your token is invalid");
    }
}