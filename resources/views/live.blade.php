<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @livewireStyles
    <!-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> -->



</head>
<body>
        <livewire:counter />
</body>
    @livewireScripts
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    
    <script src="{{ @asset('js/livewire_helpers.js') }}"></script>


</html>