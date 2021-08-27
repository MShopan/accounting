 {{-- notify success --}}

 <span id="success-message"
 x-data="{show:false}"
 x-on:save-success.window="show=true;setTimeout(()=>{ show=false; },1500);"

 >

 <span x-show="show" style="display: none;" x-transition.duration.500ms  class="text-success">Data saved</span>

</span>


{{-- end notify success --}}

