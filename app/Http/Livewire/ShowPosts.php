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
    protected $listeners = [];

    public $viewModal = false ;

    public $currentPost =[

         'id'=>'-1',
         'title'=>'',
         'description'=> '',
         'user_id'=> 1 ,
    ];

    function __construct()
    {
        // !important to add the mainHelper listiner here
         $this->listeners = $this->listeners + $this->mainListeners ;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function editPost($id)
    {
        // edit
        $post = Post::find($id);

        $this->currentPost = [
            'id'=>$post->id,
            'title'=>$post->title,
            'description'=> $post->description,
            'user_id'=> $post->user_id ,
        ];

        $this->dispatchBrowserEvent('show-edit-modal');


    }

    public function addPost()
    {

        // new
        $this->reset('currentPost');
        $this->dispatchBrowserEvent('show-edit-modal');


    }

    public function save()
    {
        $current = $this->currentPost ;
        $this->dispatchBrowserEvent('hide-edit-modal');
        // dd($this->currentPost);

        //chek if new
        if($this->currentPost['id']==-1){
            // add new record
            $post = Post::create(
                [
                    'title'=>$current['title'],
                    'description'=> $current['description'],
                    'user_id'=> $current['user_id'],

                ]
            );


        }else {


            // update current
            $post = Post::find($this->currentPost['id'])->update([
                'title'=>$current['title'],
                'description'=> $current['description'],
            ]);

        }



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
