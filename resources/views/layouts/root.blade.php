<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>



    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    {{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}


    @livewireStyles.

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/turbolinks/5.0.0/turbolinks.js" integrity="sha512-P3/SDm/poyPMRBbZ4chns8St8nky2t8aeG09fRjunEaKMNEDKjK3BuAstmLKqM7f6L1j0JBYcIRL4h2G6K6Lew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->



</head>
<body>
  <div id="my-nav" class="">

    @livewire('nav-bar')

  </div>




    <div class="container" id="content">

        {{-- offline  --}}
        @livewire('go-offline')



        {{-- components   --}}
        {{ $slot }}

    </div>


</body>


@livewireScripts


<script src="{{ @asset('js/sweetalert.min.js') }}"></script>
<script src="{{ @asset('js/livewire_helpers.js') }}"></script>

{{-- v4 bootstarp --}}
<script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}" ></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}" ></script>


{{-- alpine v2.8.2 --}}
<script src="{{ @asset('js/alpine.min.js') }}" defer></script>


</html>
