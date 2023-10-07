<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\User as UserService;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use App\Entities\User as UserEntity;

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
     * @return RedirectResponse
     */
    public function postLogin(Request $request): RedirectResponse
    {
        // input validation happens in controller
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (!(UserService::login($request->email, $request->password) instanceof UserEntity)) {
            throw new BadRequestHttpException('Invalid Credentials');
        }

        $request->session()->regenerate();

        return redirect()->intended('dashboard');
    }
}
