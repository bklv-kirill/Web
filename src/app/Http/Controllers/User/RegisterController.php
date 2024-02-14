<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\View\View;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): View
    {
        return view("user.register");
    }
}
