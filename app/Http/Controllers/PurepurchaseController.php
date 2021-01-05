<?php

namespace App\Http\Controllers;

use Carbon\Carbon as CarbonCarbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Product;
use App\Services\PurchaseService;
use NewebPay;

class PurePurchaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index()
    {
        $products = Product::all();
        return view('pure_purchases.index')->with('products',$products);
    }

    public function purchase(Request $request)
    {
        $params=$request->all();
        $product = Product::find($params['productId']);
        $service=new PurchaseService(env('CASH_STORE_ID'),env('CASH_STORE_HASH_KEY'),env('CASH_STORE_HASH_IV'));
        $result=$service->getPayload($product,$params['method']);
        dd($result);
    }

    public function successRedirect()
    {
        return redirect('/purepurchases/success');
    }

    public function orderSuccess(Request $request)                     //儲存第三方金流打過的細節資訊
    {
        log::info('app.requests',['request'=>$request->all()]);
        return view('pure_purchases.index');
    }

    public function success()
    {
        return view('pure_purchases.success');
    }

    public function back()
    {
        return view('pure_purchases.back');
    }

}