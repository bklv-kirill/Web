<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;

use Illuminate\View\View;

use App\Models\Post;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post): View
    {
        return view("posts.show", compact(["post"]));
    }
}
