<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Service;

class ServiceType extends Model
{
	protected $table = "service_type";

	public $timestamps = false;

	public function confirmService($cid, $val){
		return Service::where('client_id', '=', $cid)->where('value', '=', $val)->first();
	}
}
