@extends('layouts.master')

@section('body')
<h1>My Blog</h1>
<table class="table table-striped">
    <tr>
        <td>Post Title</td>
        <td>Created</td>
        <td>Author</td>
        <td>Actions</td>
    </tr> 
    @foreach ($posts as $post)
    <tr>
    <td>{{link_to_action('PostsController@show', $post->title, array($post->id))}}</td>
    <td>{{{ $post->created_at }}}</td>
    <td>{{{ $post->user->email }}}</td>
    <td>{{link_to_action('PostsController@edit','Edit', array($post->id), array('class' => 'btn btn-danger btn-sm'))}}</td>
    </tr>
    @endforeach
<table>
    <hr>
    {{link_to_action('PostsController@create', 'Create New Post')}} <br>
    @if(empty($_GET['search']))
    {{ $posts->links() }}
    @endif

    <h1>Search</h1>
    {{ Form::open(array('action' => 'PostsController@index', 'method' => 'GET')) }}
    {{ Form::text('search', 'search') }}
    <input type="submit" value="Search">
    {{ Form::Close() }}
@stop