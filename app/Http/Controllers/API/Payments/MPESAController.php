<?php

namespace App\Http\Controllers\API\Payments;

use App\Helpers\Mpesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class MPESAController extends Controller
{
    public function accessToken(Mpesa $mpesa){
        $access_token=$mpesa->generateToken();
        return $access_token;
    }

    // public function registerURL(Mpesa $mpesa){
    //     $body=array(
    //         'ShortCode'=>env('MPESA_SHORTCODE'),
    //         'ResponseType'=>'Completed',
    //         'ConfirmationURL'=>env('MPESA_TEST_URL').'/api/v1/2384/merchant/rnt/555/notify/confirmation',
    //         'ValidationURL'=>env('MPESA_TEST_URL').'/api/v1/2384/merchant/rnt/555/notify/validation'
    //     );
         
    //     $response=$mpesa->makeHttp(env('MPESA_REGISTER_URL'),$body);
       
    //     return $response;

    // }

    // public function simulate(Mpesa $mpesa){
    //     $body=array(
    //         'ShortCode'=>env('MPESA_SHORTCODE'),
    //         'Msisdn'=>env('MPESA_MSISDN'),
    //         'Amount'=>"500",
    //         'BillRefNumber'=>"5856",
    //         'CommandID'=>env('MPESA_COMMANDID')
    //     );
     
    //     $response=$mpesa->makeHttp(env('MPESA_SIMULATE_URL'),$body);

    //     return $response;
    // }
}
