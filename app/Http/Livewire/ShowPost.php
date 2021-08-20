<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowPost extends Component
{
    public $_id ;
    public $car = 'seat';

    public function mount($id)
    {
        $this->_id= $id; 
    }

    public function render()
    {
        return view('livewire.show-post');
    }
}
