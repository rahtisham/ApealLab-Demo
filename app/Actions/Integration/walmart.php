<?php

namespace App\Actions\Integration;

class Walmart{

    public static function getToken($client_id,$secret){

        $url = "https://marketplace.walmartapis.com/v3/token";
        $uniqid = uniqid();
        $authorization_key = base64_encode($client_id.":".$secret);

        $ch = curl_init();
        $options = array(

            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 60,
            CURLOPT_HEADER => false,
            CURLOPT_POST =>1,
            CURLOPT_POSTFIELDS => "grant_type=client_credentials",
            CURLOPT_HTTPHEADER => array(

                "WM_SVC.NAME: Walmart Marketplace",
                "WM_QOS.CORRELATION_ID: $uniqid",
                "Authorization: Basic $authorization_key",
                "Accept: application/json",
                "Content-Type: application/x-www-form-urlencoded",
            ),
        );
        curl_setopt_array($ch,$options);


        $response = curl_exec($ch);
        $code = curl_getinfo($ch,CURLINFO_HTTP_CODE);

        curl_close($ch);


        if($code == 201 || $code == 200)
        {
            $token = json_decode($response,true);
            return $token;
        }
        else{
            return 'invalid_user';
        }


    }

    public static function getItem($client_id , $secret)
    {

        $token = SELF::getToken($client_id , $secret);
        $token = $token['access_token'];
//        dd($token);

        $url = "https://marketplace.walmartapis.com/v3/items";
        $requestID = uniqid();
        $authorization = base64_encode($client_id.":".$secret);


        $curl = curl_init();

        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'WM_SVC.NAME: Walmart Marketplace',
                'Authorization: Basic '.$authorization,
                'WM_QOS.CORRELATION_ID: '.$requestID,
                'WM_SEC.ACCESS_TOKEN: '.$token,
                'Accept: application/json',
                'Content-Type: application/json',
                'Cookie: TS01f4281b=0130aff232afca32ba07d065849e80b32e6ebaf11747c58191b2b4c9d5dd53a042f7d890988bf797d7007bddb746c3b59d5ee859d0'
            ),
            CURLOPT_HTTPGET => true,
        );

        curl_setopt_array($curl,$options);
        $response = curl_exec($curl);
        $code = curl_getinfo($curl,CURLINFO_HTTP_CODE);

        curl_close($curl);

         $token = json_decode($response,true);

        if($code == 201 || $code == 200)
        {

        }
        else{

            return "invalid credential";

        }
    }

//    public static function updateInventory($client_id , $secret)
//    {
//
//    }


}





?>
