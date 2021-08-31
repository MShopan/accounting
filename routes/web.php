<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Home;
use App\Http\Livewire\ShowPost;
use App\Http\Livewire\ShowBooks;
use App\Http\Livewire\ShowUsers;
use App\Http\Livewire\ShowPosts;
use App\Http\Livewire\ShowInc;
use App\Http\Livewire\ShowCpu;
use Inertia\Inertia;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route::get('/start/{model}', function ($model) {
//     return view('start', ['model'=>$model]    );
// });
Route::get('/start', function () {
    return view('start');
});

Route::get('/live', function () {
    return view('live');
});

Route::get('spa/{any}', function ()
{
    return view('start');
})->where('any', '.*');

Route::get('/home', Home::class)->middleware('auth');
Route::get('/posts', ShowPosts::class)->middleware('auth');
Route::get('/post/{id}', ShowPost::class)->middleware('auth');
Route::get('/books', ShowBooks::class)->middleware('auth');
Route::get('/users', ShowUsers::class)->middleware('auth');
Route::get('/inc', ShowInc::class)->middleware('auth');
Route::get('/cpu', ShowCpu::class)->middleware('auth');


// inertia



Route::get('/myusers', function () {
    $message = 'hello inertia';

    $users= User::orderByDesc('id')->paginate(5);

    return inertia('users',[
        'message'=>$message,
        'users'=>$users ,
    ]);
});

Route::inertia('/home' ,'home');


// posts ##############
Route::get('/myposts', function () {
    $message = 'hello inertia';

    $posts= Post::orderByDesc('id')->paginate(12);
    $users= User::paginate(5);

    return inertia('posts',[
        'message'=>$message,
        'posts'=>$posts ,
        'users'=>$users ,
    ]);
});

Route::post('createpost' , function (Request $request)
{


    $post = [
        'title'=> $request->input('title'),
        'description'=> $request->input('description'),
        'user_id'=> $request->input('user_id'),
    ];

    Post::create($post);

    return redirect('/myposts');


});
// update post
Route::post('updatepost' , function (Request $request)
{




    $post = [
        'title'=> $request->input('title'),
        'description'=> $request->input('description'),
        'user_id'=> $request->input('user_id'),
    ];
    $id = $request->input('id') ;

    Post::find( $id )->update($post);

    return redirect('/myposts');


});
// delete post
Route::post('deletepost' , function (Request $request)
{


    $id = $request->input('id') ;

    Post::find( $id )->delete();

    return redirect('/myposts');


});






require __DIR__.'/auth.php';
