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
    protected $listeners = ['do_delete_post'];

    public $viewModal = false ;

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function editPost()
    {
        // edit
        $this->viewModal = true;
    }

    public function addPost()
    {
        // new
        $this->viewModal = true;
    }

    public function deletePost($id)
    {
        $this->warn_swal('Are you sure' , [
            'target' => 'do_delete_post' ,
            'data' => ['id'=>$id ]
        ]);

      //delete
    }

    public function do_delete_post($event){

        $id = $event['id'] ;
        Post::find($id)->delete();
    }



    public function render()
    {
        return view('livewire.show-posts',[
            'posts' => Post::where('title', 'like', '%'.$this->search.'%')->paginate($this->perPage),
        ]);
    }
}
