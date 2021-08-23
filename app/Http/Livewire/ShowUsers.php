<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;



class ShowUsers extends Component

{

    use WithPagination;

    public $search = '';

    private $perPage =5;

    protected $paginationTheme = 'bootstrap';

    function __construct()
    {
        $this->perPage = config('app.perPage');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render()
    {
        return view('livewire.show-users',[
            'users' => User::where('name', 'like', '%'.$this->search.'%')->paginate($this->perPage),
        ]);
    }
}
