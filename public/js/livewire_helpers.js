
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
            window.livewire.emit(data.target);
        }
    });

});
