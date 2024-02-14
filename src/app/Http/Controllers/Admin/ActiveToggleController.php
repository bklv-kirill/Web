<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class ActiveToggleController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user): RedirectResponse
    {
        $user->update(["is_active" => !$user->is_active]);
        
        return redirect()->route("admin.admin-panel");
    }
}
