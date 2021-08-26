<div class="container">
    <div class="" x-data="cpu">

        <input class="form-control" x-model="message" />
        <input type="checkbox" x-model="open" >

        <h3 x-text="open"></h3>

        <h3 x-text="message" class="d-block"></h3>

        <h3 x-text="upperMsg" class="d-block"></h3>

        <h3 x-text="counter" class="d-block" ></h3>
        <a class="btn btn-primary btn-sm" x-on:click="counter++">+</a>
        <a class="btn btn-danger btn-sm" x-on:click="counter--">-</a>
    </div>
    <script>
        document.addEventListener('alpine:init',function(){

            Alpine.data('cpu',()=>({
                message : 'message form cpu',
                counter : 1 ,
                open : false ,

                init(){
                    this.message = 'message form init';
                },

                get upperMsg(){
                    return this.message.toUpperCase();
                }
            }));

        });

    </script>
</div>


