<?php

 namespace App\API;

 use GuzzleHttp\Client;


 class OpenWeather{

   public static function currentWeather($city){
    $client = new Client([
        // Base URI is used with relative requests
   'base_uri' => 'https://api.openweathermap.org/data/2.5/',
        // You can set any number of default request options.
   'timeout'  => 2.0,]);

   $response = $client->request('GET', 'weather?q='.$city . '&units=metric&appid=' . env('OW_Key'));

   return json_decode((string) $response->getBody());


   }
 }
