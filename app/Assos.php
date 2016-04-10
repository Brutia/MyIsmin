<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assos extends Model
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
	
}
