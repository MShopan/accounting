
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>

    <div id="app">

   

        <!-- <Welcome model="{{ $model }}"/> -->
        <!-- <Welcome /> -->
        <router-link to="/wel" >link wel</router-link>

        <router-view></router-view>

    </div>

</body>

<script src="{{ mix('js/app.js') }}" ></script>





</html>