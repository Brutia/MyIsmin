<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Clubs extends Model
{
	
	/**
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user(){
		return $this->belongsTo('App\User');
	}
	
	/**
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function articles(){
		return $this->hasMany('App\Article');
	}
	
    public function getClubsNames() {
    	return DB::table('clubs')->select('name')->get();
    }
}
