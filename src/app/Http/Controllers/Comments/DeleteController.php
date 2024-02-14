<?php

namespace App\Http\Controllers\Comments;

use App\Http\Controllers\Controller;

use Illuminate\Http\RedirectResponse;

use App\Models\Comment;
use App\Models\Post;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post, Comment $comment): RedirectResponse
    {
        $comment->delete();

        $post->update(["comments" => $post->getComments->count()]);

        return redirect()->route("posts.show", $post);
    }
}
