<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Service;
use App\Http\Models\ServiceType;
use Carbon\Carbon;


class Clientdetail extends Model
{
	protected $table = "client_details";

	public $timestamps = false;

	
}
