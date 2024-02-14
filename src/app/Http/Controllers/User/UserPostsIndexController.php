<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Posts\BaseController;
use App\Http\Requests\Posts\IndexRequest;
use App\Models\Tag;
use Illuminate\View\View;

class UserPostsIndexController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(IndexRequest $indexRequest): View
    {
        $filters = $indexRequest->validated();
        if (!isset($filters["order"])) $filters["order"] = "new";

        $posts = $this->indexService->index($filters, true);
        $tags = Tag::query()->get();

        $title = "My Posts";

        return view("posts.index", compact(["posts", "tags", "title", "filters"]));
    }
}
