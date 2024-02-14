<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class UserRolesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user): View
    {
        Gate::authorize("change-role");

        $roles = Role::query()->get();

        return view("admin.user-roles", compact(["roles", "user"]));
    }
}
