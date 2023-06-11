<?php

namespace App\Http\Livewire\Game;


use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Index extends Component
{
    public $deals = [];

    public function getData($query = '')
    {
        $response = Http::get(route('apideals'), $query);
        return json_decode($response->body(), true);
    }

    public function mount(){
        $this->deals = $this->getDAta();
    }
    public function render()
    {
        return view('livewire.game.index');
    }
}
