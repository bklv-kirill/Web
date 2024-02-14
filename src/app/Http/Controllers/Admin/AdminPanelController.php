<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\AdminPanelRequest;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\View\View;

class AdminPanelController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(AdminPanelRequest $request): View
    {
        $filters = $request->validated();
        if (!isset($filters["is_active"])) $filters["is_active"] = null;
        if (!isset($filters["is_admin"])) $filters["is_admin"] = null;

        $users = $this->indexService->users($filters)->paginate(10);

        $data = [
            "total_users" => ["title" => "Total Users", "data" => User::query()->get()],
            "banned_users" => ["title" => "Banned Users", "data" => User::query()->where("is_active", false)->get()],
            "admins" => ["title" => "Admins", "data" => User::query()->where("role_id", "<", 3)],
            "posts" => ["title" => "Posts", "data" => Post::query()->get()],
            "comments" => ["title" => "Comments", "data" => Comment::query()->get()],
            "likes" => ["title" => "Likes", "data" => Like::query()->get()],
        ];

        return view("admin.admin-panel", compact(["users", "data", "filters"]));
    }
}
