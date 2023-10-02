<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\User as UserService;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class User extends Controller
{

    /**
     * @param Request $request
     * @return Response
     * @throws BadRequestHttpException
     */
    public function postRegister(Request $request): Response
    {
        // input validation happens in controller
        if (!filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
            throw new BadRequestHttpException('Invalid Email');
        }

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
