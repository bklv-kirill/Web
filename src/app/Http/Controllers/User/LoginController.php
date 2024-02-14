<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): View
    {
        return view("user.login");
    }
}
