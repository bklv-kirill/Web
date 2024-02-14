<?php

namespace App\View\Components\Posts;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowPostCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.posts.show-post-card');
    }
}
