@extends('layouts.master')

@section('body')
    @foreach ($posts as $post)
    <p>Title: {{{ $post->title }}}</p>
    <p>Post: {{{ $post->body }}}</p>
    @endforeach
    {{ $posts->links() }}
@stop