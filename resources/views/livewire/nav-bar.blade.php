    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light" wire:offline.class="bg-danger">
        <a class="navbar-brand" href="/home">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item">
              <a class="nav-link" href="/post/66">post 66</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/post/44">post 44</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/posts">posts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/books">books</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/users">users</a>
            </li>



          </ul>
          <form class="form-inline my-2 my-lg-0">
            <span wire:offline  class="text-danger ml-2 mr-2"><strong>Offline</strong>  </span>
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
      {{-- end nav --}}
