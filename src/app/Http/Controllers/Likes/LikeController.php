<?php

namespace App\Http\Controllers\Likes;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\RedirectResponse;

use App\Models\Post;

class LikeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post): RedirectResponse
    {
        $likes = $post->getLikes();

        $likes->create(["user_id" => Auth::id()]);

        $post->update(["likes" => $likes->get()->count()]);

        return redirect()->route("posts.show", $post);
    }
}
