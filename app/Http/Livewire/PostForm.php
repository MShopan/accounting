<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\mainHelper;
use App\Models\Post;

class PostForm extends Component
{
    use mainHelper;

    private $user_id ;

    protected $listeners= ['post_update','post_create'];

    public $currentPost =[

        'id'=>'-1',
        'title'=>'',
        'description'=> '',
        'user_id'=> 1 ,
   ];

   protected $rules = [
    'currentPost.title' => 'required|max:15',
    'currentPost.description' => 'required',
   ];


   public function mount(){
       $this->user_id = auth()->user()->id;
   }

   public function updated($propertyName)
   {
        $this->validateOnly($propertyName);
   }

    /**
     * function fore prepare form for update not do update in DB
     * run form the listener
     */
   public function post_update($event)
   {
       # edit
       $this->resetValidation();

       $id = $event ;
       $post = Post::find($id);

       $this->currentPost = [
           'id'=>$post->id,
           'title'=>$post->title,
           'description'=> $post->description,
           'user_id'=> $post->user_id ,
       ];

       $this->dispatchBrowserEvent('show-edit-modal');


   }

    /**
     * function fore prepare form for create not do create in DB
     * run from the listener
     */
   public function post_create()
   {
       # add new

       $this->resetValidation();

        $this->reset('currentPost');
        $this->dispatchBrowserEvent('show-edit-modal');

   }

   public function save()
   {
       $current = $this->currentPost ;
       // dd($this->currentPost);

       // do validation frist
       $this->validate();

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

       // close modal
       $this->dispatchBrowserEvent('hide-edit-modal');
       // fire refresh parent
       $this->emit('refresh_show_post');


   }

    public function render()
    {
        return view('livewire.post-form');
    }
}
