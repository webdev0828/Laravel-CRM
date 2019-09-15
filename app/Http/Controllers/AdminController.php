<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Redirect;
use App\Http\Models\Client;
use App\Http\Models\Service;
use App\Http\Models\ServiceType;
use App\Http\Models\Note;
use App\Http\Models\Log;

use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

   

    public function index(){
        $userData = User::where('type', '!=', '2')->get();
        return view('admin.userlist', compact('userData'));
    }


    public function userAdd(Request $request){
        $users = User::where('email', '=' , $request->email)->first();
        if($users){
            return redirect()->back()->with('error', 'Already registered users!');
        }
        
        $user               = new User;
        $user->name         = $request->name;
        $user->type         = $request->type;
        $user->username     = $request->username;
        $user->email        = $request->email;
        $user->password     = bcrypt($request->password);
        $user->status       = 0;
        $user->note         = $request->note;
        $this->addLogos(Auth::user()->id, "Add User!");
        $user->save();
        return Redirect::to('/user/list');
    }

    public function userUpdate(Request $request){
        
        $user               = User::find($request->id);
        $user->name         = $request->name;
        $user->type         = $request->type;
        $user->username     = $request->username;
        $user->email        = $request->email;
        if($request->password)
            $user->password = bcrypt($request->password);
        $user->note         = $request->note;
        $user->status       = $request->status;
        $this->addLogos(Auth::user()->id, "Updated User!");
        $user->save();
        return Redirect::to('/user/list');
    }

    public function userDelete($id){        
        $user               = User::find($id)->delete();
        
        $this->addLogos(Auth::user()->id, "Deleted User!");      

        return Redirect::to('/user/list');
    }

    // add client function by admin
    public function clientAdd(Request $request){      

        $client                         = new Client;
        $client->fname                  = $request->fname;
        $client->lname                  = $request->lname;
        
        list($dd, $mm, $yy)             = explode('.',$request->birthday);
        $birthday                       = trim($yy) . '-'.trim($mm).'-'.trim($dd);
       
        $client->birthday               = $birthday;
        $client->city                   = $request->city;
        $client->street                 = $request->street;
        $client->zip                    = $request->zip;
        $client->insurance              = $request->insurance;
        $client->insurance_number       = $request->insurance_number;
        $client->phone                  = $request->phone;
        $client->status                 = $request->status;

        $client->save();

        $cid = $client->id;
        if($request->services){
            foreach($request->services as $val){
                $service            = new Service;
                $service->client_id = $cid;
                $service->value     = $val;
                $service->save();
            }
        }
        $this->addLogos(Auth::user()->id, "Add Client!");
        return Redirect::back();

    }

 /* Start Add log Action */

    private function addLogos($uid, $note){
        $log                = new Log;
        $log->user_id       = $uid;
        $log->note          = $note;
        $log->save();
    }

/* End Add log Action */

   
}
