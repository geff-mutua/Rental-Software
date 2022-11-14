<?php
namespace App\Helpers;

class Mpesa{

    public function generateToken(){
        $headers = ['Content-Type:application/json; charset=utf8'];

        $curl = curl_init(env("MPESA_TOKEN_URL"));
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_HEADER, FALSE);
        curl_setopt($curl, CURLOPT_USERPWD, env('MPESA_CONSUMER_KEY').':'.env('MPESA_SECRET_KEY'));
        $result = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $result = json_decode($result);
        $access_token = $result->access_token;
        curl_close($curl);

        return $access_token;
    }

    public function makeHttp($url,$body){
        $headers = ['Content-Type:application/json','Authorization:Bearer '.$this->generateToken()];

    
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(

                CURLOPT_URL => $url,
                CURLOPT_HTTPHEADER=> $headers,
                CURLOPT_RETURNTRANSFER=> true,
                CURLOPT_POST=> true,
                CURLOPT_POSTFIELDS=> json_encode($body),
            )

        );

        $curl_response = curl_exec($curl);
        curl_close($curl);

        return $curl_response;

    }
}