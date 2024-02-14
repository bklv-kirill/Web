<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Http\Requests\User\StoreRequest;

use Illuminate\Http\RedirectResponse;

use App\Models\User;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $storeRequest): RedirectResponse
    {
        $userData = $storeRequest->validated();

        User::create($userData);

        return redirect()->route("user.login");
    }
}
