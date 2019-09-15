<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Redirect;
use App\User;
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
    protected $redirectTo = '/dashboard/clients';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login( Request  $request){


        $this->validate($request, [
            'email'        =>'required|email',
            'password'     =>'required'    
        ]);

        $userInfo = array(
            'email'     => $request->email,
            'password'  => $request->password,
            'status'    => '1'
        );

        if(Auth::attempt($userInfo)){
            return Redirect::to('/dashboard/clients');
        }else{
            return redirect()->back()->with('error','Account must be Active by admin!');
        }


      

  }
}
