<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Http\Models\User;

use Auth;


trait CounterPlus {

    public $age = 18 ;

    public function increment10(){
        $this->count = $this->count + 10 ;
    }
}


class Counter extends Component
{
    use CounterPlus ;
    public $count = 0;
    public $name ;
    public $couna = 15;
    public $user;
    public $email;

    function __construct(){
        $this->name = 'mohammed ali';
        // $this->user = User->get();
        $user = Auth::user();
        $this->email =  Auth::user()->email ; 
    }
        

    public function increment()
    {
        $this->count++;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
