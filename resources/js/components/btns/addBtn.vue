<template>
    <button @click="$emit('click')"  class="btn btn-sm btn-primary " >
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-1" viewBox="0 0 20 20" fill="currentColor">
    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
    </svg>
    <span class="hidden md:inline">
        {{$t('acc.add')}}
    </span>
    </button>
</template>

<script>

export default {

}
</script>
