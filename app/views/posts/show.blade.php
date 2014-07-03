@extends('layouts.master')

@section('body')
    <p>Title: {{{ $posts->title }}}</p>
    <p>Post: {{{ $posts->body }}}</p>
    <p>Post: {{{ $posts->created_at }}}</p>
    {{ Form::open(array('action' => array('PostsController@destroy', $posts->id), 'method' => 'DELETE')) }}
    {{ Form::submit('Delete') }}
    {{ Form::Close() }}
@stop