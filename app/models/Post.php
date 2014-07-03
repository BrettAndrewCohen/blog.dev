<?php

class Post extends BaseModel {

    protected $table = 'posts';

    static public $rules = array(
    'title'      => 'required|max:100',
    'body'       => 'required|max:10000'
	);

    public function user()
	{
	    return $this->belongsTo('User');
	}

}