<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Search;

class ApiSearchController extends Controller
{
  /*"totalResults": 138640,  companyRegistrationFrom 2014-02-28  */

    public function SearchBusnessId($vatId)
    {
      $baseUrl =  Search::baseUrl();
      $url =  $baseUrl .$vatId;
      $headers =  Search::defaultHeader();
      $query = Search::defaultQuery();
      $search = Search::createHttpGet($headers,$url,$query);
      return $search;
   }
   public function SearchPostalCode($code)
   {  //  'totalResults=true&maxResults=1000&resultsFrom=0&streetAddressPostCode=01300&companyForm=OY'
      dump($code);
     $baseUrl =  Search::baseUrl();
     $url =  $baseUrl;
     $headers =  Search::defaultHeader();
     $query = array(
       'totalResults' => true,
       'maxResults' => 1000,
       'resultsFrom' => 0,
       'streetAddressPostCode' => $code,
       'companyForm' =>'OY'
     );
     $search = Search::createHttpGet($headers,$url,$query);
     dump($search);
     return $search;
  }
   public function SearchByName($name)
   {
     $baseUrl =  Search::baseUrl();
     $url =  $baseUrl;
     $headers =  Search::defaultHeader();
     $defaultQuery = Search::defaultQuery();
     $query = array(
       'totalResults' => true,
       'maxResults' => 1000,
       'resultsFrom' => 0,
       'name' => $name,
     );

     $search = Search::createHttpGet($headers,$url,$query);
     return $search;
  }
  public function SearchTimeFrame($from, $to)
  {
    // https://avoindata.prh.fi/bis/v1?totalResults=false&maxResults=10&resultsFrom=0&
    // companyRegistrationFrom=2021-10-16&companyRegistrationTo=2021-11-04
    $baseUrl =  Search::baseUrl();
    $url =  $baseUrl;
    $headers =  Search::defaultHeader();
    $defaultQuery = Search::defaultQuery();
    $query = array(
      'totalResults' => true,
      'maxResults' => 1000,
      'resultsFrom' => 0,
      'companyRegistrationFrom' => $from,
      'companyRegistrationTo' => $to,
  );
    $search = Search::createHttpGet($headers,$url,$query);
    return $search;
  }
}
