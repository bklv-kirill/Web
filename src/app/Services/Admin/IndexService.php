<?php

namespace App\Services\Admin;

use App\Http\Filters\User\UserFilter;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IndexService
{
    public function users(array $filters)
    {
        $filter = app()->make(UserFilter::class, ["queryParams" => array_filter($filters)]);
        $users = User::filter($filter)->where("id", "!=", Auth::id())->where("role_id", ">=", Auth::user()->role_id);

        return $users;
    }
}
