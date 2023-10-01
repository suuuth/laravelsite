<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class User extends Controller
{

    /**
     * @param Request $request
     * @return Response
     */
    public function postRegister(Request $request): Response
    {
        dd($request);
        return new Response([
            'message' => 'ligma',
            'data' => 'register'
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function postLogin(Request $request): Response
    {
        return new Response([
            'message' => 'ligma',
            'data' => 'login'
        ]);
    }
}
