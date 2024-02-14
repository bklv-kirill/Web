<?php

namespace App\Http\Filters\User;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class UserFilter extends AbstractFilter
{
    public const LOGIN = "login";
    public const IS_ACTIVE = "is_active";
    public const IS_ADMIN = "is_admin";

    protected function getCallbacks(): array
    {
        return [
            self::LOGIN => [$this, "login"],
            self::IS_ACTIVE => [$this, "isActive"],
            self::IS_ADMIN => [$this, "isAdmin"],
        ];
    }

    public function login(Builder $builder, string $login)
    {
        $builder->where("login", "LIKE", "%{$login}%");
    }

    public function isActive(Builder $builder, string $is_active)
    {
        if ($is_active === "active") $builder->where("is_active", true);
        else if ($is_active === "ban") $builder->where("is_active", false);
    }

    public function isAdmin(Builder $builder, string $is_admin)
    {
        if ($is_admin === "admin") $builder->where("role_id", "<", 3);
        else if ($is_admin === "user") $builder->where("role_id", 3);
    }
}
