<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define("like", function (User $user, Post $post) {
            return $post->getLikes()->where("user_id", $user->id)->exists();
        });

        Gate::define("delete", function (User $user, Post $post) {
            return $user->id === $post->user->id || $user->role_id === 1 || $user->role_id === 2;
        });

        Gate::define("update", function (User $user, Post $post) {
            return $user->id === $post->user->id && $user->is_active;
        });

        Gate::define("active", function (User $user) {
            return $user->is_active;
        });

        Gate::define("change-role", function (User $user) {
            return $user->role_id === 1;
        });
    }
}
