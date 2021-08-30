<template>
   <div >
   <h1 class="mx-4 shadow-xl rounded-lg text-green-500">hello form vue</h1>
     {{message}}

     <div id="counter"></div>
   </div>
</template>

<script>
export default {
    props :[
    'message',
    'posts',
    ]
};
</script>
