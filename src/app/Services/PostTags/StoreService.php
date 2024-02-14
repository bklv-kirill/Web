<?php

namespace App\Services\PostTags;

use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;

class StoreService
{
    public function store(Post $post, array $tags)
    {
        foreach ($tags as $tag) {
            if (!Tag::query()->where("id", (int)$tag)->exists()) abort(403);
            else if (PostTag::query()->where(["post_id" => $post->id, "tag_id" => (int)$tag])->exists()) continue;
            PostTag::query()->create(["post_id" => $post->id, "tag_id" => (int)$tag]);
        }
    }
}
