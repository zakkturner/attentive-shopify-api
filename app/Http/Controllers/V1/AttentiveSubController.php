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

        $email = $request->input("email");

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
            return response(['success' => true, 'message' => 'Customer added to email list'], 201);

        } else {


            return response(['error' => true, 'email' => $email, 'request' => $request->all(), 'message' =>
            $response->body()],
            $response->status());
        }
    }
}
