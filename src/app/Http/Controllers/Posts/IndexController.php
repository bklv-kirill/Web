<?php

namespace App\Http\Controllers\Posts;

use App\Http\Requests\Posts\IndexRequest;
use App\Models\Tag;
use Illuminate\View\View;

class IndexController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(IndexRequest $indexRequest): View
    {
        $filters = $indexRequest->validated();
        if (!isset($filters["order"])) $filters["order"] = "new";

        $posts = $this->indexService->index($filters, false);
        $tags = Tag::query()->get();

        $title = "All Posts";

        return view("posts.index", compact(["posts", "tags", "title", "filters"]));
    }
}
