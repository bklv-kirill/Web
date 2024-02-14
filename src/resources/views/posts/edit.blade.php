@extends("layouts.main")

@section("content")
    @section("title", $post->title)

    <x-forms.form :action="route('posts.update', $post)" method="PATCH">
        <x-forms.input name="title" type="text" value="{{ $post->title }}">
            Title
        </x-forms.input>
        <x-forms.textarea name="content" value="{{ $post->content }}">
            Content
        </x-forms.textarea>


        <h5 class="mt-3">Tags:</h5>
        @forelse($tags as $tag)
            <x-forms.checkbox name="tags[]" value="{{ $tag->id }}" for="add{{ $tag->name }}"
                              :checked="in_array($tag->id, $post->tags->pluck('id')->toArray())">
                {{ $tag->name }}
            </x-forms.checkbox>
        @empty
            <span>No Tags</span><br>
        @endforelse

        <button type="submit" class="btn btn-primary mt-2">Update Post</button>
    </x-forms.form>

@endsection
