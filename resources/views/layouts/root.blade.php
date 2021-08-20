<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    @livewireStyles



</head>
<body>
    <div id="nav">
       <a href="/post/66">post 66</a>
       <a href="/post/44">post 44</a>
       <a href="/books">books</a>
    </div>

    <div id="content">

        {{ $slot }}
    </div>
</body>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/turbolinks/5.0.0/turbolinks.js" integrity="sha512-P3/SDm/poyPMRBbZ4chns8St8nky2t8aeG09fRjunEaKMNEDKjK3BuAstmLKqM7f6L1j0JBYcIRL4h2G6K6Lew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

@livewireScripts
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <script src="{{ @asset('js/livewire_helpers.js') }}"></script>

</html>