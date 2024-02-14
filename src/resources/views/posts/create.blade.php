@extends("layouts.main")

@section("content")
    @section("title", "Create New Post")

    <h2>Create New Post</h2>
    <x-forms.form :action="route('posts.store')" method="POST">
        <x-forms.input name="title" type="text" :value="old('title')">
            Post Title
        </x-forms.input>

        <x-forms.textarea name="content" :value="old('content')">
            Post Content
        </x-forms.textarea>

        <h5 class="mt-3">Tags:</h5>
        @forelse($tags as $tag)
            <x-forms.checkbox name="tags[]" value="{{ $tag->id }}" for="add{{ $tag->name }}"
                              :checked="old('tags') && in_array($tag->id, old('tags'))">
                {{ $tag->name }}
            </x-forms.checkbox>
        @empty
            <span>No Tags</span><br>
        @endforelse

        <button type="submit" class="btn btn-primary mt-3">Create New Post</button>
    </x-forms.form>

@endsection
