<?php

namespace App\Http\Controllers\Posts;

use App\Http\Requests\Posts\UpdateRequest;
use App\Models\Post;
use App\Models\PostTag;

class UpdateController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $updateRequest, Post $post)
    {
        $postData = $updateRequest->validated();

        $post->update(["title" => $postData["title"], "content" => $postData["content"]]);

        PostTag::query()->where("post_id", $post->id)->delete();
        if (isset($postData["tags"])) $this->postTagsStoreService->store($post, $postData["tags"]);

        return redirect()->route("posts.show", $post);
    }
}
