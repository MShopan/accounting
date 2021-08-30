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

Route::get('/myposts', function () {
    $message = 'hello inertia';

    $posts= Post::paginate(5);
    $users= User::paginate(5);

    return inertia('posts',[
        'message'=>$message,
        'posts'=>$posts ,
        'users'=>$users ,
    ]);
});

Route::get('/myusers', function () {
    $message = 'hello inertia';

    $users= User::paginate(5);

    return inertia('users',[
        'message'=>$message,
        'users'=>$users ,
    ]);
});

Route::inertia('/home' ,'home');




require __DIR__.'/auth.php';
