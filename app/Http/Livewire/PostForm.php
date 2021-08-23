<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\mainHelper;
use App\Models\Post;



class PostForm extends Component
{
    use mainHelper;

    protected $listeners= ['post_update','post_create'];

    public $currentPost =[

        'id'=>'-1',
        'title'=>'',
        'description'=> '',
        'user_id'=> 1 ,
   ];

   public function post_update($event)
   {
       # edit
       $post = Post::find($event->id);

       $this->currentPost = [
           'id'=>$post->id,
           'title'=>$post->title,
           'description'=> $post->description,
           'user_id'=> $post->user_id ,
       ];

       $this->dispatchBrowserEvent('show-edit-modal');


   }

   public function post_create($event)
   {
       # add new

        $this->reset('currentPost');
        $this->dispatchBrowserEvent('show-edit-modal');

   }

   public function save()
   {
       $current = $this->currentPost ;
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

       // close modal
       $this->dispatchBrowserEvent('hide-edit-modal');
       // fire refrish parent
       $this->dispatchBrowserEvent('refresh_show_post');


   }

    public function render()
    {
        return view('livewire.post-form');
    }
}
