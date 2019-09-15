<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Auth;
use Redirect;

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
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

   

    protected function register(Request $request){
        $confirm = User::where('email', '=', $request->email)->first();
        if($confirm){
            return redirect()->back()->with('error','Email already exist!');
        }else{
            $user               = new User();
            $user->name         = $request->name;
            $user->email        = $request->email;
            $user->password     = bcrypt($request->password);
            $user->status       = 0;       
            $user->type         = 0;       
            $user->save();
            return redirect()->back()->with('success','Account registered');
        }
    }
}
