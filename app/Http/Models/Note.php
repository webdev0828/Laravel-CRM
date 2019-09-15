<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Client;
use App\User;


class Note extends Model
{
	protected $table = "notes";

	public function getClientDataByClientID(){
		return Client::where('id', '=', $this->client_id)->get();
	}

	public function getUserDataByUserID(){
		return User::where('id', '=', $this->user_id)->get();
	}

}
