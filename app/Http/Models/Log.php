<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Service;
use App\Http\Models\ServiceType;
use Carbon\Carbon;
use App\Http\Models\Clientservice;
use App\Http\Models\Client;
use App\User;

class Log extends Model
{
	protected $table = "logs";

	public function getUserNameByUserID(){
		return User::find($this->user_id)->name;
	}

	public function getClientFNameByUserID(){
		return Client::find($this->client_id)->fname;
	}

	public function getClientLNameByUserID(){
		return Client::find($this->client_id)->lname;
	}

}
