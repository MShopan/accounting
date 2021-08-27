<div class="card mt-3" >
    <div class="card-header">
      {{  $title  }}
        <x-success-msg></x-success-msg>
        {{-- loading section  --}}
        <span wire:loading class="spinner-border spinner-border-sm  mx-3" role="status">
            <span class="sr-only">Loading...</span>
        </span>
        {{--  end loading section  --}}

    </div>
    <div class="card-body">
        {{ $slot }}
    </div>
</div>
