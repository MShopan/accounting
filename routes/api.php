<?php

use App\Http\Controllers\PartitionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\BillHeaderController;
use App\Http\Controllers\StockController;
use App\Models\Customer;
use App\Models\Partition;
use App\Models\mainVar;
use App\Models\User;
use App\Models\Product;
use App\Models\Cat;
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

// delet any model

Route::middleware('auth:sanctum')->post('/delete/model', function (Request $req) {

    $model = $req->input('model') ;
    $id = $req->input('id') ;

    $modelPath = "App\\Models\\$model" ;

    // var_dump([
    //     'model'=>$model ,
    //     'id'=>$id ,
    //     'path'=> $modelPath ,
    // ]);



    $delete = $modelPath::where('id', $id)->first()->delete();

    return response()->json( ['deleted' => $delete ] );
});



Route::get('/products', function (Request $req) {

    $parameters = $req->all();

    $search = $parameters['search'] ;

    $products = Product::where('name', 'like', '%'.$search.'%')
                  ->paginate(config('app.perPage'));


    $cats = Cat::all();

    $partitions = Partition::all();



    foreach ($products as $key => $product) {

        $product->prices = $product->prices()->get();

    }

    return response()->json(
        [
            'partitions'=> $partitions ,
            'cats'=>$cats ,
            'products'=>$products ,

        ]
    ) ;

});



Route::post('/partition/create', [PartitionController::class, 'create']);
Route::post('/partition/edit', [PartitionController::class, 'edit']);

Route::post('/product/create', [ProductController::class, 'create']);
Route::post('/product/edit', [ProductController::class, 'edit']);

Route::get('/cats', [CatController::class, 'index']);
Route::post('/cat/create', [CatController::class, 'create']);
Route::post('/cat/edit', [CatController::class, 'edit']);


Route::get('/sections', [SectionController::class, 'index']);
Route::post('/section/create', [SectionController::class, 'create']);
Route::post('/section/edit', [SectionController::class, 'edit']);


Route::post('/stock/create', [StockController::class, 'create']);

Route::get('/mybills/sections', [BillController::class, 'get_sections']);

Route::get('bill_counter', function () {

    // the value defult value is zero
    $counter = mainVar::where('name','bill_counter' )->first();
    $counter->value++ ;
    $counter->save();
    return $counter;

});

Route::post('add_product_with_new_bill_id', [BillController::class, 'add_product_with_new_bill_id'] );
Route::post('add_product_to_bill_id', [BillController::class, 'add_product_to_bill_id'] );
Route::post('refresh_section', [BillController::class, 'refresh_section'] );
Route::post('assign_customer_to_bill_id', [BillController::class, 'assign_customer_to_bill_id'] );
Route::post('get_bill_header', [BillController::class, 'get_bill_header'] );
Route::post('close_bill', [BillController::class, 'close_bill'] );
Route::post('close_section', [BillController::class, 'close_section'] );


Route::get('bill_header', [BillHeaderController::class, 'index'] );
Route::get('get_stock', [StockController::class, 'get_stock'] );


