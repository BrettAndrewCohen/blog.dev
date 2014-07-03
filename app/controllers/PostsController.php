<?php

class PostsController extends \BaseController {
	
	public function __construct()
	{
	    // call base controller constructor
	    parent::__construct();

	    // run auth filter before all methods on this controller except index and show
	    $this->beforeFilter('auth.basic', array('except' => array('index', 'show')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::with('user')->orderBy('title', 'asc')->paginate(4);
		
		if (Input::has('search')) {
			$q = Input::get('search');
	    	$posts = Post::with('user')->where('title', 'LIKE', '%'. $q .'%')->get();  
		}
	    return View::make('posts.index')->with('posts', $posts);
	    
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('posts.create-edit');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		// create the validator
	    $validator = Validator::make(Input::all(), Post::$rules);

	    // attempt validation withInput() makes form sticky
	    if ($validator->fails()) {
	    	Session::flash('errorMessage', 'Post Failed');
	        return Redirect::back()->withInput()->withErrors($validator);
	    }
	    else {
			$post = new Post;
			$post->title = Input::get('title');
			$post->body = Input::get('body');
			$post->save();
	    	Session::flash('successMessage', 'Post Sumbitted!');
			return Redirect::action('PostsController@index');
	    }

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$posts = Post::find($id);
		return View::make('posts.show')->with('posts', $posts);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::find($id);
		return View::make('posts.create-edit')->with('post', $post);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// create the validator
	    $validator = Validator::make(Input::all(), Post::$rules);

	    // attempt validation withInput() makes form sticky
	    if ($validator->fails()) {
	        Session::flash('errorMessage',  'Updated failed!');
	        return Redirect::back()->withInput()->withErrors($validator);
	    }
	    else {
	    	$post = Post::find($id);
			$post->title = Input::get('title');
			$post->body = Input::get('body');
			$post->save();
	    	Session::flash('successMessage', 'Post Updated!');
			return Redirect::action('PostsController@index');
	    }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

	//findOrFail is a good sub for find, and it will fail if nothing is found.
	$post = Post::findOrFail($id);
	$post->delete();
	Session::flash('successMessage',  'Post deleted successfully!');
	return Redirect::action('PostsController@index');
	}


}
