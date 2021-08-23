<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;
use App\Http\Livewire\mainHelper;



class ShowPosts extends Component
{
    use WithPagination;
    use mainHelper;


    public $search = '';
    private $perPage =5;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refresh_show_post'=>'$refresh'];

    public $viewModal = false ;



    function __construct()
    {
        // !important to add the mainHelper listiner here
         $this->listeners = $this->listeners + $this->mainListeners ;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function do_delete_element($event){
    // this function do the delete element
    // in the blade write deleteElement(model_elment_id)  to run this function after aknoldge event run

        $id = $event['id'] ;
        Post::find($id)->delete();
    }



    public function render()
    {
        return view('livewire.show-posts',[
            'posts' => Post::where('title', 'like', '%'.$this->search.'%')
            ->orderByDesc('id')
            ->paginate($this->perPage)
            ,
            'posts_count' => Post::where('title', 'like', '%'.$this->search.'%')->count()
        ]);
    }
}
