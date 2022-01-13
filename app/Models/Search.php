<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Search extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function baseUrl()
    {
        $baseURI = 'https://avoindata.prh.fi/bis/v1/';

        return $baseURI;
    }
    public function  defaultHeader()
    {
      return $headers = array(
            'User-Agent' => 'PHP-testing/1.0',
            'Accept'     => 'application/json',
        );
    }
    public function defaultQuery()
    {
      $default = array(
        'totalResults' => true,
        'maxResults' => 1000,
        'resultsFrom' => 0,
      );
      return $default;
    }
    public function createHttpGet($headers,$url,$query)
    {
      $res = Http::withHeaders($headers)
                  -> get($url,$query);  /// GET API Response
      $serverE = $res-> serverError();
      $clientE = $res-> clientError();

      $errors = array('serverE' => $serverE,
                      'clientE'=> $clientE);
      $status = $res->status();
      $statusMessage = SELF::statuscode($status);

      return $response = array(
         'Status' => $status,
         'Status_message' => $statusMessage,
         'Errors' => $errors,
         'Response' => $res->json(),
        );
    }
    public function statuscode($status)
    {
      if($status === 504)
      {
          $statusMessage = 'PRH taustajärjestelmä ei vastaa';
          return $statusMessage;
      }elseif($status === 404)
      {
          $statusMessage = 'Hakemaasi y-tunnusta tai nimeä ei löydy, HUOM henkilöyhtiöitä ei voida hakea automaattihaun kautta!';
          return $statusMessage;
      }else {
          $statusMessage = 'ok';
          return $statusMessage;
      }
    }



}
