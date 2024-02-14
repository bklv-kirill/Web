<?php

namespace App\Http\Controllers;


use App\Http\Requests\Admin\ChangeRoleRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class ChangeRoleController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ChangeRoleRequest $request, User $user): RedirectResponse
    {
        $role_id = $request->validated(["role_id"]);

        $user->update(["role_id" => $role_id]);

        return redirect()->route("admin.admin-panel");
    }
}
