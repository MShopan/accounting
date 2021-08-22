<?php
namespace App\Http\Livewire;

trait mainHelper {

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
