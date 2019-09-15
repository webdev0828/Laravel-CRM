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

class ClientController extends Controller
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

  
/* Start Client Action */

    public function clientUpdate(Request $request){       
        
        $cid                = $request->id;

        if($request->services){
            //remove service by client_id
            Service::where('client_id', '=', $cid)->delete();
            //add service by multi selected service
            foreach($request->services as $val){
                $service = new Service;
                $service->client_id = $cid;
                $service->value = $val;
                $service->save();
            }
        }

        $client                         = Client::find($cid);
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
        $this->addLogos(Auth::user()->id, "Updated Client!");
        $client->save();

        return Redirect::back();

    }
    
    public function clientStatusChange(Request $request){      
        
        $cid                            = $request->id;        
        $client                         = Client::find($cid);        
        $client->status                 = $request->status;
        $this->addLogos(Auth::user()->id, "Updated Client Statue!");
        $client->save();
        return Redirect::back();

    }

    public function clientStatusUpdate($id){
        $client             = Client::find($id);
        $client->status     = 2;
        $client->save();

        return Redirect::back();
    }

    public function clientSearch(Request $request){
        $clientsList = Client::where('fname', 'like', '%'.$request->search_str.'%')
                    ->orWhere('lname', 'like', '%'.$request->search_str.'%')
                    ->orWhere('city', 'like', '%'.$request->search_str.'%')
                    ->orWhere('street', 'like', '%'.$request->search_str.'%')
                    ->orWhere('zip', 'like', '%'.$request->search_str.'%')
                    ->orWhere('insurance', 'like', '%'.$request->search_str.'%')
                    ->orWhere('insurance_number', 'like', '%'.$request->search_str.'%')
                    ->orWhere('phone', 'like', '%'.$request->search_str.'%')
                    ->orderBy('id', 'desc')->get();



        $serviceType = ServiceType::get();
        return view('dashboard.dashboard', compact('clientsList', 'serviceType'));
    }

    public function clientAddNotes(Request $request){        
        $note               = new Note;
        $note->client_id    = $request->id;
        $note->user_id      = Auth::user()->id;
        $note->description  = $request->description;
        if($request->todo)
            $note->todo         = 1;
        if($request->priority)
            $note->priority     = 1;
        $this->addLogos(Auth::user()->id, $request->description, $request->id);
        $note->save();

        return Redirect::to('/dashboard/clients');
    }

    public function clientAddNotesAndDetail(Request $request){ 
        if($request->description){
            $note               = new Note;
            $note->client_id    = $request->cid;
            $note->user_id      = Auth::user()->id;
            $note->description  = $request->description;
            if($request->todo)
                $note->todo         = 1;
            if($request->priority)
                $note->priority     = 1;
            
            $note->save();
        }      
        
        if($request->key_nr || $request->nurs_degree || $request->fam_member || $request->client_since || $request->drop_out){
            Clientdetail::where('client_id', '=', $request->cid)->delete();
            $clientDetail                   =  new Clientdetail;
            $clientDetail->client_id        = $request->cid;
            $clientDetail->key_nr           = $request->key_nr; 
            $clientDetail->nurs_degree      = $request->nurs_degree; 
            $clientDetail->fam_member       = $request->fam_member; 
            $clientDetail->client_since     = $request->client_since; 
            $clientDetail->drop_out         = $request->drop_out; 
            $clientDetail->save(); 
        }

        Clientservice::where('client_id', '=', $request->cid)->delete();
        if($request->mon){
            $clientService = new Clientservice;
            $clientService->client_id = $request->cid;
            $clientService->value = 1;
            $clientService->save();
        }
        if($request->tue){
            $clientService = new Clientservice;
            $clientService->client_id = $request->cid;
            $clientService->value = 2;
            $clientService->save();
        }
        if($request->wed){
            $clientService = new Clientservice;
            $clientService->client_id = $request->cid;
            $clientService->value = 3;
            $clientService->save();
        }
        if($request->thu){
            $clientService = new Clientservice;
            $clientService->client_id = $request->cid;
            $clientService->value = 4;
            $clientService->save();
        }
        if($request->fri){
            $clientService = new Clientservice;
            $clientService->client_id = $request->cid;
            $clientService->value = 5;
            $clientService->save();
        }
        if($request->sat){
            $clientService = new Clientservice;
            $clientService->client_id = $request->cid;
            $clientService->value = 6;
            $clientService->save();
        }
        if($request->sun){
            $clientService = new Clientservice;
            $clientService->client_id = $request->cid;
            $clientService->value = 7;
            $clientService->save();
        }
        $this->addLogos(Auth::user()->id, $request->description, $request->cid);
       
        return Redirect::back();
    }

    public function clientShowByID($id){
        $client         = Client::find($id);
        $clientDetail   = Clientdetail::where('client_id', '=', $id)->first();
        $clientService  = Clientservice::where('client_id', '=', $id)->get();
        $serviceType    = ServiceType::get();
        $todoData       = Note::where('client_id', '=', $id)->orderBy('created_at', 'desc')->get();
        return view('dashboard.showclient', compact('client', 'serviceType', 'clientDetail', 'clientService', 'todoData'));
    }

/* End Client Action */


/* Start Add log Action */

    private function addLogos($uid, $note, $cid=0){
        $log                = new Log;
        $log->user_id       = $uid;
        $log->note          = $note;
        $log->client_id     = $cid;
        $log->save();
    }

/* End Add log Action */

}
