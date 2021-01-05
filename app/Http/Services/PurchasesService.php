<?php

namespace App\Services;

use Carbon\Carbon;

class PurchaseService
{
    private $merchantID;
    private $hashKey;
    private $hashIV;

    public function __constructor($merchantID=null,$hashKey=null, $hashIV=null)
    {
        $this ->merchantID = ($merchantID != null)? $merchantID:env('CASH_STORE_ID');
        $this ->hashKey = ($hashKey != null)? $hashKey:env('CASH_STORE_HASH_KEY');
        $this ->hashIV = ($hashIV != null)? $hashIV:env('CASH_STORE_HASH_IV');
    }

    public function getPayload($product,$method)
    {
        $payload = $this ->setPayload($product,$method);
        return $payload;
    }

    public function setPayload($product,$method)
    {
        $payload = collect([
            'MerchantID'=>$this ->merchantID,
            'RespondType'=>'JSON',
            'TimeStamp'=>Carbon::now()->timestamp,
            'Version' =>1.5,
            'MerchantOrderNo'=>Carbon::now()->timestamp,
            'ItemDes'=>$product ->name,
            'ReturnURL'=>env('CASH_RETURN_URL'),
            'NotifyURL'=>env('CASH_NOTIFY_URL'),
            'ClientBack'=>env('CASH_CLIENT_BACK_URL')

        ]);

        if($method=='atm')
        {
            $payload = $payload->merge(["VACC"=>1, 'CustomerURL'=>env('CASH_CLIENT_CUSTOMER_UR')]);
        }

        if($method=='card')
        {
            $payload = $payload->merge(['CREDIT'=>1]);
        }

        return $payload;
    }
}

