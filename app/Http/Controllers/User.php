<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\User as UserService;

class User extends Controller
{

    /**
     * @param Request $request
     * @return Response
     */
    public function postRegister(Request $request): Response
    {
        UserService::register(
            $request->get('email'),
            $request->get('username'),
            $request->get('password')
        );

        return new Response([
            'message' => 'Success!'
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
