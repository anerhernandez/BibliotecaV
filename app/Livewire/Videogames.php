<?php

namespace App\Livewire;

use App\Models\Videogame;
use Livewire\Component;

class Videogames extends Component
{
    public $videogames;
    public $videogame;
    public $addv = false;
    public $titulo;
    public $descripcion;
    public $caratula;
    public $detalles = false;

    public function render()
    {
        return view('livewire.videogames');
    }
    public function mount(){
        $this->videogames = Videogame::all();
    }
    public function addV(){
        $this->addv = true;
    }
    public function closeaddV(){
        $this->addv = false;
    }

}
