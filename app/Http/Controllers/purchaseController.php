<?php

namespace App\Http\Controllers;

use Carbon\Carbon as CarbonCarbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use NewebPay;

class PurchaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index()
    {
        return view('purchases.index');
    }

    public function purchase()
    {
        $newebpay = new NewebPay();
        return $newebpay->payment(
            Carbon::now()->timestamp,  // 訂單編號
            999,                       // 交易金額
            '測試用訂單l',              // 交易描述
            'wtf1525852@gmail.com'     // 付款人信箱
        )->submit();
    }

    public function successRedirect()
    {
        return redirect('/purchases/success');
    }

    public function orderSuccess(Request $request)                     //儲存第三方金流打過的細節資訊
    {
        log::info('app.requests',['request'=>$request->all()]);
        return view('purchases.index');
    }

    public function success()
    {
        return view('purchases.success');
    }

    public function back()
    {
        return view('purchases.back');
    }

}