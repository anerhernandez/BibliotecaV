<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;
use App\Models\Videogame;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Comments extends Component
{
    public $videogamec;
    public $addvC = false;
    public $titulo;
    public $descripcion;
    public $caratula;
    public $valoracion;
    public $comentario;
    public $videogame_with_comment = null;
    public $comments;
    public function render()
    {
        return view('livewire.comments')->layout('layouts.app');
    }
    public function mount(){
        $current_id = $this->getGameC();
        $this->videogamec = DB::table('videogames')->where('id', '=', $current_id->id)->get();
        $this->comments = DB::table('comments')->where('videogame_id', '=', $current_id->id)->get();
    }
    public function getGameC(){
        if($data = Session::get('videogame_detail')) {
            return $data;
        }
    }
    public function openaddC(){
        $this->addvC = true;
        $this->clearfields();
        $this->getGameC();
    }
    public function closeaddC(){
        $this->addvC = false;
    }
    public function clearfields(){
        $this->valoracion = '';
        $this->comentario = '';
    }
    public function createComment(){
        $current_id = $this->getGameC();
        $this->videogame_with_comment = DB::table('videogames')
        ->join('comments', 'videogames.id', '=', 'comments.videogame_id')
        ->join('users', 'comments.user_id', '=', 'users.id')
        ->where('videogames.id', '=', $current_id->id)
        ->get();

        if (!$this->videogame_with_comment->isEmpty()) {
            $comment = Comment::find($this->videogame_with_comment->first()->id);
            $comment->update(
                [
                    'comentario' => $this->comentario
                ]
            );
        }
        else{
            Comment::Create(
                [
                    'comentario' => $this->comentario,
                    'valoracion' => $this->valoracion,
                    'user_id' => Auth::id(),
                    'videogame_id' => $this->getGameC()->id
                ]
            );
        }
        $this->closeaddC();
        $this->clearfields();
    }
    public function deleteVideogame(){
        $current_id = $this->getGameC();
        Videogame::join('comments', 'videogames.id', '=', 'comments.videogame_id')->where('videogames.id', '=', $current_id->id)->delete();
    }
}
