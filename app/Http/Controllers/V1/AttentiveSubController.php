<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AttentiveSubController extends Controller
{

    /**
     *
     *
     *  @return Response
     * */
    public function __invoke(Request $request): Response{
//        dd($request->all());
    return  response(["data", $request->all()]);
    }
}
