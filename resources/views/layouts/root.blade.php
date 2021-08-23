<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>


    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">


    @livewireStyles

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/turbolinks/5.0.0/turbolinks.js" integrity="sha512-P3/SDm/poyPMRBbZ4chns8St8nky2t8aeG09fRjunEaKMNEDKjK3BuAstmLKqM7f6L1j0JBYcIRL4h2G6K6Lew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->




</head>
<body>
    <div id="nav">
        <a href="/home">home</a>
       <a href="/post/66">post 66</a>
       <a href="/post/44">post 44</a>
       <a href="/books">books</a>
       <a href="/posts">posts</a>
       <a href="/users">users</a>
    </div>

    <div id="content">

        {{ $slot }}

    </div>


</body>


@livewireScripts
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="{{ @asset('js/livewire_helpers.js') }}"></script>

{{-- v4 bootstarp --}}
<script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}" itegrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


</html>
