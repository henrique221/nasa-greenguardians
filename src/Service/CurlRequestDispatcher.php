<?php


namespace App\Service;


class CurlRequestDispatcher
{
    public function get($url, $data = [])
    {
        $params = '';

        foreach($data as $key=>$value)
            $params .= $key.'='.$value.'&';

        $params = trim($params, '&');

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url.'?'.$params ); //Url together with parameters
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in Browser
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT , 7); //Timeout after 7 seconds
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $result = json_decode(curl_exec($ch));

        curl_close($ch);

        return $result;
    }

    public function post($url,$data = [],array $headers = ["Content-Type: application/json"]){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);

        $err = curl_error($ch);

        curl_close($ch);

        if ($err) {
            throw new RuntimeException($err);
        } else {
            return $response;
        }
    }

}