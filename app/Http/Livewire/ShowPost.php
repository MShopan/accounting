<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowPost extends Component
{
    public $_id ;


    public function mount($id)
    {
        $this->_id= $id;
    }

    public function render()
    {
        return view('livewire.show-post',[
            'post'=>'App\Models\Post'::find($this->_id)
        ]);
    }
}
