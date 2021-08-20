<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowBooks extends Component
{
    public $books = [1,2,3,4];
    public function render()
    {
        return view('livewire.show-books');
    }
}
