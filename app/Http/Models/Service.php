<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Service;
use App\Http\Models\ServiceType;

class Service extends Model
{
	protected $table = "services";

	public $timestamps = false;

	public function getServiceTypeName(){
		return ServiceType::where('id', '=', $this->value)->first()->type;
	}
}
