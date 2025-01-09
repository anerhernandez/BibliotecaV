<?php

namespace App\Livewire;

use App\Models\Videogame;
use Livewire\Component;

class Videogames extends Component
{
    public $videogames;
    public $videogame;

    public function render()
    {
        return view('livewire.videogames');
    }
    public function mount(){
        $this->videogames = Videogame::all();
    }
}
