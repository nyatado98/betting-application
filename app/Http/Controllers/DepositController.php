<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mpesa;

class DepositController extends Controller
{
    //
    public function stk(){
        $mpesa = new \Safaricom\Mpesa\Mpesa();

        $BusinessShortCode = 174379;
        $LipaNaMpesaPassKey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
        $TransactionType = 'CustomerPaybillOnline';
        $Amount = 1;
        $PartyA = 254726585782;
        $PartyB = 174379;
        $PhoneNumber = 254726585782;
        $CallBackUrl = 'https://mydomain.com/path';
        $AccountReference = 'Bettings company dans';
        $TransactionDesc = 'Transaction desc';
        $Remarks = 'Remarks';


        $stkPushSimulation =$mpesa->STKPushSimulation(
            $BusinessShortCode,
            $LipaNaMpesaPassKey,
            $TransactionType,
            $Amount,
            $PartyA,
            $PartyB,
            $PhoneNumber,
            $CallBackUrl,
            $AccountReference,
            $TransactionDesc,
            $Remarks
        );
        dd($stkPushSimulation);
    }
}
