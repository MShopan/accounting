
// this is main helpers for live wire events in js

// console.log('hello form asset');

window.addEventListener('swal' , function (e) {

    let data = e.detail ;
    swal({
        title : data.title ,
        text : data.text ,
        icon : data.icon ,
    })
    .then((accept)=>{
        if(accept){
            window.livewire.emit(data.target , data.data );
        }
    });

});


window.addEventListener('show-edit-modal' , function (e) {
    $('#edit-modal').modal('show');

} );

window.addEventListener('hide-edit-modal' , function (e) {
    $('#edit-modal').modal('hide');

} );

var $on = function($eventName,$fun){

    window.addEventListener($eventName ,function ($event) {
        $fun($event);
    });

}

// $on('show-edit-modal',()=>{
//     console.log('#on fire this this');

// });


