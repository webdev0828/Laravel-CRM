<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Service;
use App\Http\Models\ServiceType;
use Carbon\Carbon;
use App\Http\Models\Clientservice;

class Client extends Model
{
	protected $table = "clients";

	public $timestamps = false;

	public function getServices(){
		return Service::where('client_id', '=', $this->id)->get();
	}

	public function getAge(){
		
		list($y, $m, $d) = explode('-',$this->birthday);
		$year = (int)trim($y);
		
		return Carbon::createFromDate($year)->age; 
	}

	public function getClientService($val){
		return Clientservice::where('client_id', '=', $this->id)->where('value', '=', $val)->first();
	}
	

}
