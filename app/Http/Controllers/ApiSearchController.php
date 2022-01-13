<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Search;

class ApiSearchController extends Controller
{
    public function searchBusnessId($vatId)
    {
      $baseUrl =  Search::baseUrl();
      $url =  $baseUrl .$vatId;
      $headers =  Search::defaultHeader();
      $query = Search::defaultQuery();
      $search = Search::createHttpGet($headers,$url,$query);
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
