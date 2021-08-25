<div>
    <!-- <div wire:poll.750ms>
        Current time: {{ now() }}
    </div> -->





    {{-- <div id="user-data">
        {{auth()->user()}}
    </div> --}}
    <h1>{{$_id}}</h1>
    @if (!@empty($post))
        <h2>{{$post->title}}</h2>
        <h2>{{$post->description}}</h2>
    @else
    <div>post do not exists</div>
    @endif

</div>
