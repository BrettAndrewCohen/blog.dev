@extends('layouts.master')

@section('body')
    <h1>Update a blog post!</h1>
    {{ Form::model($post, array('action' => array('PostsController@update', $post->id), 'method' => 'PUT')) }}
    <p>
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title') }}
        {{ $errors->first('title', '<span class="help-block">:message</span>') }}
    </p>
    <p>
        {{ Form::label('body', 'Body') }}
        {{ Form::textarea('body') }}
        {{ $errors->first('body', '<span class="help-block">:message</span>') }}
    </p>
        <input type="submit" value="Submit">
    {{ Form::close() }}
@stop