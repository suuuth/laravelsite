<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class User extends Controller
{
    public function login(Request $request): Response
    {
        return new Response([
            'message' => 'ligma!',
            'data' => $request
        ]);
    }
}
