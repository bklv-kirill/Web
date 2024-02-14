<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): View
    {
        Gate::authorize("active");
        $tags = Tag::query()->get();

        return view("posts.create", compact(["tags"]));
    }
}
