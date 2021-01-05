<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurePurchaseController;

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

Route::get('/purchases',[PurchaseController::class,'index']);
Route::post('/purchases',[PurchaseController::class,'purchase']);

Route::post('/purchases/successRedirect',[PurchaseController::class,'successRedirect']);   //成功付款的畫面

Route::get('/purchases/success',[PurchaseController::class,'success']);                    //使用者利用轉帳成功付款的接口
Route::post('/purchases/success',[PurchaseController::class,'orderSuccess']);              //使用者利用轉帳成功付款的接口

Route::get('/purchases/back',[PurchaseController::class,'back']);                          //使用者反悔不買了



Route::get('/purePurchases',[PurePurchaseController::class,'index']);
Route::post('/purePurchases',[PurePurchaseController::class,'purchase']);
    
Route::post('/purePurchases/successRedirect',[PurePurchaseController::class,'successRedirect']);   //成功付款的畫面
    
Route::get('/purePurchases/success',[PurePurchaseController::class,'success']);                    //使用者利用轉帳成功付款的接口
Route::post('/purePurchases/success',[PurePurchaseController::class,'orderSuccess']);              //使用者利用轉帳成功付款的接口
    
Route::get('/purePurchases/back',[PurePurchaseController::class,'back']);

Route::get('/', function () {
    return view('welcome');

  

});