<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Livewire\mainHelper;



class ShowPosts extends Component
{
    use WithPagination;
    use mainHelper;

    public $myModel = 'App\Models\Post';
    public $search = '';
    private $perPage =5;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refresh_show_post'=>'$refresh'];

    public $viewModal = false ;



    function __construct()
    {
        // !important to add the mainHelper listiner here
         $this->listeners = $this->listeners + $this->mainListeners ;

         $this->perPage = config('app.perPage');
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
        return view('livewire.show-posts',[
            'posts' => $this->myModel::where('title', 'like', '%'.$this->search.'%')
            ->orderByDesc('id')
            ->paginate($this->perPage)
            ,
            'posts_count' => $this->myModel::where('title', 'like', '%'.$this->search.'%')->count()
        ]);
    }
}
