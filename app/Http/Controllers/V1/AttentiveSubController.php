<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;


class AttentiveSubController extends Controller
{

    /**
     *
     *
     *  @return Response
     * */
    public function __invoke(Request $request): Response{

        $shop = env('SHOP_NAME');

        $email = $request->get("email");
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer ". env('ATTENTIVE_API_KEY'),
        ])->post('https://api.attentivemobile.com/v1/subscriptions',[
            "user" => [
                "email" => $email
            ],
            "signUpSourceId" => env('ATTENTIVE_SOURCE_ID'),

        ]);
        if ($response->successful()) {

            $shopifyResponse = Http::post("{$shop}/admin/api/2024-07/customers.json", ['customer' => "email:{$email}"]);
            if ($shopifyResponse->status() === 201) {
                return response(['success' => true, 'message' => 'Customer added to email list and created on Shopify'], 201);
            } else {
                return response(['error' => 'Failed to create customer on Shopify', 'details' => $shopifyResponse->body()], 500);
            }
        } else {

            dd($response->json());
            return response($response->body());
        }
    }
}
