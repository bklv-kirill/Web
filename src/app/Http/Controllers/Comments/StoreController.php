<?php

namespace App\Http\Controllers\Comments;

use App\Http\Controllers\Controller;

use App\Http\Requests\Comments\StoreRequest;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

use App\Models\Post;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $storeRequest, Post $post): RedirectResponse
    {
        $commentData = $storeRequest->validated();

        $comments = $post->getComments();

        $comments->create(["user_id" => Auth::id(), "content" => $commentData["content"]]);
        $post->update(["comments" => $comments->get()->count()]);

        return redirect()->route("posts.show", $post);
    }
}
