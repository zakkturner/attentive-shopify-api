<?php

namespace App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class ShopifyService
{
    /**
     * Create a new class instance.
     */


  public function exchangeToken(Request $request){
      $client_id = env('SHOPIFY_API_KEY');
      $client_secret = env('SHOPIFY_API_SECRET');
      $shop = env('SHOP_NAME');
      $scopes ="";
      $url = "https://{$shop}/admin/oauth/authorize?client_id={$client_id}&scope={}";

//      $grant_type = 'urn:ietf:params:oauth:grant-type:token-exchange';
//      $subject_token = '';
//      $store_name = env("SHOP_NAME");
//
//      $response = Http::post("https://{$store_name}/admin/oauth/access_token}");
//      if ($response->successful()) {
//          $access_token = $response->json()['access_token'];
//          return response()->json(['access_token' => $access_token]);
//      } else {
//          return response()->json($response->json(), 400);
//      }
  }
}
