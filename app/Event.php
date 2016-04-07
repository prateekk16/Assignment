<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'events';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];

     public function categories(){
    	return $this->belongsToMany('App\Category', 'category_event', 'event_id', 'category_id');
    }

     public function subscribers(){
        return $this->hasMany('App\Subscriber','event_id');
    }
}
