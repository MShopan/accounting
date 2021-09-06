<template>
<div class="myapp flex gap-4">
<div class="overflow-y-auto h-screen w-52 bg-white">
   <ul>

       <li v-for="el in list"  :key="el" class="
       my-1
       bg-white w-40 text-black font-bold hover:bg-blue-300 text-center
       "
       >{{el}}</li>

   </ul>
</div>

<div class="maim w-full mt-4">
    <div class=" flex justify-center items-center ">

<div class="flex-auto">hello</div>
<div class="flex-auto">hello</div>
<div class="flex-auto">hello</div>

</div>

<div class="grid grid-cols-4 w-full mt-10">
    <div>at</div>
    <div>at</div>
    <div>at</div>
    <div>at</div>
    <div>at</div>
    <div>at</div>
</div>
</div>
</div>

</template>

<script>
export default {
 data :()=>{
     return {
        list : [
            1,2,3,4,5,6,7,8,9,10, 11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30
        ]
     }
 }
}
</script>

