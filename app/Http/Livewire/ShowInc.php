<?php

namespace App\Http\Livewire;
use App\Models\Post;

use Livewire\Component;
use Livewire\WithPagination;

class ShowInc extends Component
{
    use WithPagination;

    public $counter=0;
    public $myPosts ;
    protected $paginationTheme = 'bootstrap';
    public $perPage = 6;


    public function mount()
    {
        $this->counter = 6;
        $this->perPage= config('app.perPage');
    }

    public function increament()
    {
        $this->counter++;
    }

    public function render()
    {
        $posts = Post::paginate($this->perPage);
        $this->myPosts = json_encode($posts);
        return view('livewire.show-inc',[
            'posts'=> $posts
        ]);
    }
}
