<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $table = 'actors';
    protected $primaryKey = 'actor_id';

    
        public function getFirstNameAttribute($value) // Vraca prvo slovo uppercase
    {
        return ucfirst(strtolower($value));
       // return ucfirst($value);  // ovo ne radi!
    }
    
}
