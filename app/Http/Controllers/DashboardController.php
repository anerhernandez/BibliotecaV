<?php

namespace App\Http\Controllers;

use App\Models\Videogame;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public $videogames;
    
    public function mostrarvideogames(){
        $this->videogames = Videogame::all(); 
    }

}
