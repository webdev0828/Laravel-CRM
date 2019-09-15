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
use App\Http\Models\Clientdetail;
use App\Http\Models\Clientservice;
use App\Http\Models\Task;
use App\Http\Models\Log;

use App\User;

class HomeController extends Controller
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

   
    public function dashboard()
    {
        $clientsList = Client::orderBy('id', 'desc')->get();
        $serviceType = ServiceType::get();
        return view('dashboard.dashboard', compact('clientsList', 'serviceType'));
    }

/* Start Profile Action */
    public function profileSettingUpdate(Request $request){

        $uid                = Auth::user()->id;

        $user               = User::find($uid);
        $user->username     = $request->username;
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->phone        = $request->phone;
        $user->status       = $request->status;

        $user->save();

        return Redirect::to('/dashboard/clients');

    }
/* End Profile Action */


/* Start Todo Action */

    public function todoAction(){
        $todoData = Note::orderBy('created_at', 'desc')->where('todo', '=', '1')->get();
        return view('dashboard.todo', compact('todoData'));
    }

/* End Todo Action */

/* Start Task Action */

    public function tasks(){
        $tasks = Task::get();
        return view('tasks.list', compact('tasks'));
    }
/* End Task Action */


/* Start Logs Action */

    private function addLogos($uid, $note){
        $log                = new Log;
        $log->user_id       = $uid;
        $log->note          = $note;
        $log->save();
    }

    public function logs(){
        $logs = Log::get();
        return view('logs.list', compact('logs'));
    }
/* End Logs Action */
}
