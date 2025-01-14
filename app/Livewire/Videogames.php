<?php

namespace App\Livewire;

use App\Models\Videogame;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
        return view('livewire.videogames')->layout('layouts.app');;
    }
    public function mount(){
        $this->videogames = $this->getGames();
    }
    public function getGames(){
        return Videogame::all();
    }
    public function openaddV(){
        $this->addv = true;
        $this->clearfields();
        $this->getGames();
    }
    public function closeaddV(){
        $this->addv = false;
    }
    public function clearfields(){
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
        $this->clearfields();
        $this->videogames = $this->getGames();
    }
    public function deleteVideogame(Videogame $videogame){
        $videogame->delete();
        $this->clearfields();
        $this->closeaddV();
        $this->videogames = $this->getGames();
    }
    public function openDetails(Videogame $videogame){
        $this->videogame = $videogame;
        $this->detalles = true;
        Session::put('videogame_detail', $videogame);
        Session::save();
        return redirect()->route('comments', $videogame)->with('videogame', $videogame);
    }
}
