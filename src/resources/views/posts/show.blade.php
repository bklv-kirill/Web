@extends('layouts.main')

@section('content')
@section('title', $post->title)

<x-posts.show-post-card :post="$post" />
@endsection
