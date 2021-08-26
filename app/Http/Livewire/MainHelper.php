<?php
namespace App\Http\Livewire;
use Illuminate\Support\Facades\Log;


trait mainHelper {

private $mainListeners = ['do_delete_element','case444'];



public function deleteElement($id)
{
    $this->warn_swal('Are you sure' , [
        'target' => 'do_delete_element' ,
        'data' => ['id'=>$id ]
    ]);

  //delete
}

public function send_swal( $msg, $type , $options = array() )
{
    //check_target
    if(array_key_exists( "target" , $options )){
        $target = $options['target'] ;

    } else {
        $target = 'none_swal_event';
    }
    //check_data
    if(array_key_exists( "data" , $options )){
        $data = $options['data'] ;

    } else {
        // data is empty
        $data = '';
    }



    $this->dispatchBrowserEvent('swal',
    [
        'title'=> config('app.name') ,
        'text'=>$msg ,
        'icon'=>$type ,
        'target'=>$target ,
        'data'=>$data ,
    ]
    );
}

public function success_swal($msg,$options = array() ){

    $this->send_swal( $msg,  "success" , $options );

}

public function error_swal($msg,$options = array() ){

    $this->send_swal( $msg,  "error" , $options );

}

public function warn_swal($msg,$options = array() ){

    $this->send_swal( $msg,  "warning" , $options );

}


}
