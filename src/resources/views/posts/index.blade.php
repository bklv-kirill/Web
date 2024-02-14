@extends('layouts.main')

@section('content')
    @section('title', $title)
    <h2>Search Posts</h2>

    <x-forms.form action="" method="GET">
        <x-forms.input name="stitle" type="text" :value="$filters['stitle'] ?? ''">
            Post Title
        </x-forms.input>

        <x-forms.select name="order" span="Order By">
            <option value="new" @selected($filters['order'] === 'new')>Date: New</option>
            <option value="old" @selected($filters['order'] === 'old')>Date: Old</option>
            <option value="cup" @selected($filters['order'] === 'cup')>Comments: Up</option>
            <option value="cdown" @selected($filters['order'] === 'cdown')>Comments: Down</option>
            <option value="lup" @selected($filters['order'] === 'lup')>Likes: Up</option>
            <option value="ldown" @selected($filters['order'] === 'ldown')>Likes: Down</option>
        </x-forms.select>

        <h5 class="mt-3">Tags:</h5>
        @forelse($tags as $tag)
            <x-forms.checkbox name="tags[]" value="{{ $tag->id }}"
                              for="search{{ $tag->name }}"
                              :checked="isset($filters['tags']) && in_array($tag->id, $filters['tags'])">
                {{ $tag->name }}
            </x-forms.checkbox>
        @empty
            <span>No Tags</span><br>
        @endforelse


        <button type="submit" class="btn btn-primary mt-3">Sort Posts</button>
    </x-forms.form>

    <hr>

    @forelse ($posts as $post)
        <x-posts.post-card :post="$post"/>
    @empty
        <h2 class="text-center">No Posts</h2>
    @endforelse

    {{ $posts->withQueryString()->links() }}

@endsection
