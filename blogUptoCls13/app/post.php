<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
	protected $dates = ['published_at'];
    public function author(){
    	return $this->belongsTo(User::class);
    }
    public function getDateAttribute($value){
    	return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
    }
    public function scopeLatestFirst(){
    	return $this->orderBy('created_at','desc');
    }
    
}
