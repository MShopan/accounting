<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{


    public $redirect_url ;


    function __construct(Request $request)
    {
        $this->redirect_url = '/myposts' ;
    }

    public function index()
    {
        $message = 'hello inertia';

        $posts= Post::orderByDesc('id')->paginate(12);
        $users= User::paginate(5);

        return inertia('posts',[
            'message'=>$message,
            'posts'=>$posts ,
            'users'=>$users ,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $post = [
            'title'=> $request->input('title'),
            'description'=> $request->input('description'),
            'user_id'=> $request->input('user_id'),
        ];

        Post::create($post);

        return redirect($this->redirect_url);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $post = [
            'title'=> $request->input('title'),
            'description'=> $request->input('description'),
            'user_id'=> $request->input('user_id'),
        ];
        $id = $request->input('id') ;

        Post::find( $id )->update($post);

        return redirect($this->redirect_url);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request)
    {
        //
        $id = $request->input('id') ;


        Post::find( $id )->delete();

        return redirect($this->redirect_url);


    }
}
