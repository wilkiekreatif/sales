<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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

Route::get('/test', function () {
    // return view('test',['nama' => 'Wildan Auliana']);
    // return view('test')->with('nama','Wildan Auliana');

    return view('test',[
        'nama'      => 'Wildan Auliana',
        'alamat'    => 'Garut',
        'umur'      => '28',     
    ]);

    // return view('test')
    //     ->with('nama','Wildan Auliana')
    //     ->with('umur','28')
    //     ->with('alamat','Garut');
});

//pemanggilan dari controller dashboard
Route::get('/admin', [DashboardController::class,'index']);

//Category
Route::get('/admin/category', [CategoryController::class,'index']);
Route::get('/admin/category/create', [CategoryController::class,'create']);
Route::post('/admin/category', [CategoryController::class,'store']);
