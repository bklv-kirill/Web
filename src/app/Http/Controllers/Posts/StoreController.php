<?php

namespace App\Http\Controllers\Posts;

use App\Http\Requests\Posts\StoreRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class StoreController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $storeRequest): RedirectResponse
    {
        $postData = $storeRequest->validated();

        /** @var User */
        $user = Auth::user();
        $post = $user->posts()->create($postData);

        if (isset($postData["tags"])) $this->postTagsStoreService->store($post, $postData["tags"]);

        return redirect()->route("posts.index");
    }
}
