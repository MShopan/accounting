<?php

namespace App\Http\Livewire;
use App\Http\Livewire\MainHelper;

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
    use MainHelper;

    protected $listeners = ['delete'];

    public $count = 0;
    public $name ;
    public $couna = 15;
    public $user;
    public $email;
    public $items = ['mohammed','ali'];
    public $tour = [
        'fr'=>['name'=>'ali'],
        'sec'=>['name'=>'khaled'],
    ];

    public $update = 0 ;

    function __construct(){
        $this->name = 'mohammed ali';
        // $this->user = User->get();
        if (Auth::user()){
            $user = Auth::user();
            $this->email =  Auth::user()->email ;
        }

    }

    public function updatingCount($value)
    {
        $this->update++;
    }

    public function delete()
    {
        $this->name = 'success';
    }


    public function increment()
    {
        $this->count++;


    }

    public function areDelete()
    {
        $this->success_swal('are you sure delete ?', [
            'target'=>'delete'
        ]);
    }

    public function decreament()
    {
        $this->count--;



    }




    public function add()
    {
        $this->items[] = $this->name;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
