<?php

namespace App\Http\Livewire;
use App\Models\Post;

use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Livewire\mainHelper;


class ShowInc extends Component
{
    use WithPagination;
    use mainHelper;

    public $myPosts ;
    public $search ='';
    public $myModel = 'App\Models\Post';

    protected $paginationTheme = 'bootstrap';
    public $perPage = 6;

    protected $listeners = ['refresh_show_post'=>'$refresh' , 'do_delete_element'];



    public function mount()
    {
        $this->perPage= config('app.perPage');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function do_delete_element($event){
    // this function do the delete element
    // in the blade write deleteElement(model_elment_id)  to run this function after aknoldge event run

        $id = $event['id'] ;
        $this->myModel::find($id)->delete();
    }


    public function render()
    {
        $posts = Post::where('title', 'like', '%'.$this->search.'%')
        ->orderByDesc('id')
        ->paginate($this->perPage);

        $this->myPosts = json_encode($posts);
        return view('livewire.show-inc',[
            'posts'=> $posts ,
            'posts_count' => $this->myModel::where('title', 'like', '%'.$this->search.'%')->count()

        ]);
    }
}
