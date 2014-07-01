<?php

class Post extends Eloquent {

    protected $table = 'posts';

    static public $rules = array(
    'title'      => 'required|max:100',
    'body'       => 'required|max:10000'
	);

}