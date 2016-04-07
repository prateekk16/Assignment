<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'subscribers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'event_id'];

     public function events(){
     	return $this->belongsTo('App\Event');
    }
}
