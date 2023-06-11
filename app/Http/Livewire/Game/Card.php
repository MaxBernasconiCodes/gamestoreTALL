<?php

namespace App\Http\Livewire\Game;

use Livewire\Component;

class Card extends Component
{
    public $deal;
    public function render()
    {
        return view('livewire.game.card');
    }
}
