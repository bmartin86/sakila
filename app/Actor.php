<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    
    protected $primaryKey = 'actor_id';

    
        public function getFirstNameAttribute($value) // Vraca prvo slovo uppercase
    {
        return ucfirst(strtolower($value));
       // return ucfirst($value);  // ovo ne radi!
    }
    
        public function films()
    {
        return $this->belongsToMany('App\Film','film_actor','actor_id','film_id');   
    }
}
