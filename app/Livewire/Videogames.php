<?php

namespace App\Livewire;

use App\Models\Videogame;
use Illuminate\Support\Facades\Auth;
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
        $this->videogames = Videogame::select('titulo', 'descripcion', 'caratula')->join('comments', 'comments.videogame_id', '=', 'videogames.id')->get();
    }
    public function openaddV(){
        $this->addv = true;
    }
    public function closeaddV(){
        $this->addv = false;
    }
    public function clearfield(){
        $this->titulo = '';
        $this->descripcion = '';
        $this->caratula = '';
    }
    public function createVideogame(){
        Videogame::Create(
            [
                'titulo' => $this->titulo,
                'descripcion' => $this->descripcion,
                'caratula' => $this->caratula,
                'user_id' => Auth::id()
            ]
        );
        $this->closeaddV();
    }
    // public function deleteVideogame(){
    //     // code
    // }
}
