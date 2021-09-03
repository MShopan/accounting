<?php

use App\Models\Customer;
use App\Models\Partition;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/me', function (Request $request) {
//     dump($request->user());
//     return $request->user();
// });

Route::get('/first', function () {
    return response()->json(['name'=>'mohammed']);
});

Route::middleware('auth:sanctum')->get('/myusers', function (Request $req) {

    $parameters = $req->all();

    $search = $parameters['search'] ;

    $users = User::where('name', 'like', '%'.$search.'%')->paginate(5);


    return response()->json( ['users' => $users  ] );
});


Route::middleware('auth:sanctum')->get('/customers', function (Request $req) {

    $parameters = $req->all();

    $search = $parameters['search'] ;

    $customers = Customer::where('name', 'like', '%'.$search.'%')->paginate(5);


    return response()->json( ['customers' => $customers  ] );
});

Route::middleware('auth:sanctum')->get('/partitions', function (Request $req) {

    $parameters = $req->all();

    $search = $parameters['search'] ;


    $partitions = Partition::where('name', 'like', '%'.$search.'%')->paginate(5);


    return response()->json( ['partitions' => $partitions  ] );
});



