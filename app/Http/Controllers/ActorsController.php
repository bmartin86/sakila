<?php

namespace App\Http\Controllers;

use App\Actor;
use Illuminate\Http\Request;

class ActorsController extends Controller
{
    public function Index () {
        //return "Hello";
        $glumci = Actor::paginate(15);
        return view('actor.index', compact('glumci'));
    }
}
