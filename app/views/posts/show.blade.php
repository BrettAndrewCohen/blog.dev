@extends('layouts.master')

@section('body')
    <p>Title: {{{ $posts->title }}}</p>
    <p>Post: {{{ $posts->body }}}</p>
@stop