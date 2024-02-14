<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post): View

    {
        Gate::authorize("update", $post);
        
        $tags = Tag::query()->get();

        return view("posts.edit", compact(["post", "tags"]));
    }
}
