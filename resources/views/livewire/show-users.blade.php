
<div>
  <div>
    <label for="search">Search</label>
    <input type="text" wire:model="search">
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>created_at</th>
      </tr>
    </thead>
    <tbody>
      
        @foreach ($users as $user)
        <tr key="{{$user->id}}">
            <td>{{$user->id}}</td>    
            <td>{{$user->name}}</td>    
            <td>{{$user->email}}</td>    
            <td>{{$user->created_at}}</td>    
        </tr>
        @endforeach
        
    </tbody>
  </table>

  {{  $users->links() }}

</div>