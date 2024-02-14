<div class="card">
    <div class="card-header">
        Creater: <span class="text-primary">{{ $post->user->login }}</span>
    </div>
    <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text">{{ $post->content ?? 'With Out Content' }}</p>
        <p class="card-text">Tags:
            @forelse($post->tags as $tag)
                <span class="text-primary">{{ $tag->name }}</span>
            @empty
                With Out Tags
            @endforelse
        </p>
        @if ($post->user_id !== Auth::id())
            @if (!Gate::check('like', $post))
                <x-forms.form :action="route('likes.like', $post)" method="POST">
                    <button type="submit" class="btn btn-success mb-2">Like This Post</button>
                </x-forms.form>
            @else
                <x-forms.form :action="route('likes.dislike', $post)" method="DELETE">
                    <button type="submit" class="btn btn-danger mb-2">DisLike This Post</button>
                </x-forms.form>
            @endif

        @endif
        @if(Auth::check())
            @if(Auth::user()->is_admin || Gate::check("delete", $post))
                <x-forms.form :action="route('posts.delete', $post)" method="DELETE">
                    <button type="submit" class="btn btn-danger">Delete Post</button>
                </x-forms.form>
            @endif
        @endif
        @can("update", $post)
            <a href="{{ route("posts.edit", $post) }}" class="btn btn-primary mt-2">Edit Post</a>
        @endcan
    </div>
    <div class="card-footer text-body-secondary">
        &#9997; {{ $post->comments }}
        &#10084; {{ $post->likes }}
    </div>
    <div class="card-footer text-body-secondary">
        Created At: {{ $post->created_at }}
    </div>

    @can("active")
        <x-forms.form :action="route('comments.store', $post)" method="POST" class="m-3">
            <x-forms.textarea name="content" :value="old('content')">
                Comment
            </x-forms.textarea>
            <button type="submit" class="btn btn-primary mt-3">Comment</button>
        </x-forms.form>
    @endcan

</div>

<div class="list-group mt-3 mb-3">
    @forelse ($post->getComments as $comment)
        <div class="list-group-item list-group-item">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Author: <span
                        class="text-{{ $post->user->id === $comment->user->id ? 'danger' : 'primary' }}">{{ $comment->user->login }}</span>
                </h5>
                <small class="text-body-secondary">{{ $comment->created_at }}</small>
            </div>
            <p class="mb-1">Comment: {{ $comment->content }}</p>

            @if ($comment->user->id === Auth::id() || $comment->post->user->id === Auth::id())
                <x-forms.form :action="route('comments.delete', [$post, $comment])" method="DELETE">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </x-forms.form>
            @endif
        </div>
    @empty
        <h2 class="text-center">No Comments</h2>
    @endforelse
</div>
