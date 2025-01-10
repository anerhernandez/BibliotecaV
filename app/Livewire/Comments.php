<?php

namespace App\Livewire;

use Livewire\Component;

class Comments extends Component
{
    public $variable;

    public function render()
    {
        return view('livewire.comments');
    }
    public function mount(){
        $this->variable = "test comments";
    }
}
