<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowPost extends Component
{
    public $_id ;

    public function mount($_id)
    {
        $this->_id= $_id; 
    }

    public function render()
    {
        return view('livewire.show-post');
    }
}
