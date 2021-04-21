<?php
use App\Http\Controllers\ProductController;
//use App\Http\Controllers\Admin\ProductionController;
use App\Http\Controllers\CartsController;
use Illuminate\Support\Facades\Route;

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
Route::get('/about', function(){
    // dd(request('name'),request()->name, request('age'));
   // return $array;
   $name = request('name');
   $age = request('age');
   $buah =['Anggur','Pear','Apel','Timun'];
   $cuaca = 'hujan';

   return view ('about',[
       'name'=> $name,
       'buah'=> $buah,
       'cuaca'=> $cuaca,
       'age'=>$age
   ]);
});

Route::get('/', function () {
     return view('welcome');
} );

Route::get('/cart', function(){
    $sosis =['Sosis Sapi','Sosis Ayam','Sosis Origial'];
    $nama = request('nama');
    $umur = request('umur');
    $jadwal ='tidak masuk';

    return view ('cart',[
        'sosis'=> $sosis,
        'nama'=> $nama,
        'umur'=> $umur,
        'jadwal'=> $jadwal
    ]);
});

Route::get('/product',[ProductController::class, 'index']);
Route::post('/add-to-card',[CartsController::class, 'store']);
Route::get('/carts',[CartsController::class, 'index']);

Route::resource('/admin/product', 'App\Http\Controllers\Admin\ProductController');
