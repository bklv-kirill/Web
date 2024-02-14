<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Http\Requests\User\AuthRequest;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(AuthRequest $authRequest): RedirectResponse
    {
        $userData = $authRequest->validated();

        return Auth::attempt($userData) ? redirect("/") : redirect()->route("user.login")->withInput()->withErrors(["auth" => "Auth Error"]);
    }
}
