<?php

namespace App\Services\Posts;

use App\Http\Filters\Post\PostFilter;
use App\Models\Post;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class IndexService
{
    public function index(array $filters, bool $flag): LengthAwarePaginator
    {
        $filter = app()->make(PostFilter::class, ["queryParams" => array_filter($filters)]);

        if ($flag) {
            /** @var User */
            $user = Auth::user();
            $posts = $user->posts()->filter($filter);
        } else $posts = Post::filter($filter);

        return $posts->paginate(5);
    }
}
