<?php

use App\Http\Controllers\mySeederController;
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
use App\Models\Product;
use App\Models\mainVar;
use App\Models\Price;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StockController;
use App\Models\Cat;
use App\Models\Partition;

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

Route::get('seed/test', [mySeederController::class, 'index'] );


Route::get('/', function () {
    return inertia('home');
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



Route::middleware('auth')->get('/myusers', function () {

    $message = 'hello inertia';

    return inertia('users',[
        'message'=>$message,
    ]);
});

Route::get('/customers', function () {
    return inertia('customers');
});
Route::middleware('auth')->get('/partitions', function () {
    return inertia('partitions');
});

Route::inertia('/cats' ,'cats');
Route::inertia('/products' ,'products');




Route::inertia('/home' ,'home');
Route::inertia('/list' ,'list');
Route::inertia('/stock_add' ,'stockAdd')->middleware('auth');
Route::inertia('/stock_dis' ,'stockDis')->middleware('auth');
Route::inertia('/mybills' ,'mybills')->middleware('auth');
Route::inertia('/bills' ,'bills')->middleware('auth');
Route::inertia('/stock' ,'stock')->middleware('auth');


// post controller

Route::get('/myposts', [PostController::class, 'index']);
Route::post('/myposts/delete', [PostController::class, 'destroy']);
Route::post('/myposts/create', [PostController::class, 'create']);
Route::post('/myposts/edit', [PostController::class, 'edit']);

Route::get('/preview_receipt', function ()
{
    // return "hello world";
    return view('preview_receipt');
});





require __DIR__.'/auth.php';
