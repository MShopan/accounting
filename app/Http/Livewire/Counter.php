<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Http\Models\User;

use Auth;

trait mainHelper {

    public function send_swal( $msg, $type , $options = array() )
    {
        if(array_key_exists( "target" , $options )){
            $target = $options['target'] ;

        } else {
            $target = 'none_swal_event';
        }

        $this->dispatchBrowserEvent('swal',
        [
            'title'=> config('app.name') ,
            'text'=>$msg ,
            'icon'=>$type ,
            'target'=>$target ,
        ]
        );
    }

    public function success_swal($msg,$options = array() ){

        $this->send_swal( $msg,  "success" , $options );

    }

    public function error_swal($msg,$options = array() ){

        $this->send_swal( $msg,  "error" , $options );

    }
}

trait CounterPlus {

    public $age = 18 ;

    public function increment10(){
        $this->count = $this->count + 10 ;
    }
}


class Counter extends Component
{
    use CounterPlus ;
    use mainHelper;

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

        $this->success_swal('can i help ' );

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
