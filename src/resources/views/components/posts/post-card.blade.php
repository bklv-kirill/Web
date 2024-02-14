<div class="card text-center mb-5">
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
        <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">Show More</a>
        @if(Auth::check())
            @if(Gate::check("delete", $post))
                <x-forms.form :action="route('posts.delete', $post)" method="DELETE">
                    <button type="submit" class="btn btn-danger mt-2">Delete Post</button>
                </x-forms.form>
            @endif
        @endif
    </div>
    <div class="card-footer text-body-secondary">
        &#9997; {{ $post->comments }}
        &#10084; {{ $post->likes }}
    </div>
    <div class="card-footer text-body-secondary">
        Created At: {{ $post->created_at }}
    </div>
</div>
