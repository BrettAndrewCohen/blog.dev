<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return Redirect::action('HomeController@sayHello', ['Codeup']);
	}

    public function Resume()
    {
    	return View::make('pages.resume');
    }

	public function Portfolio()
	{
	    return View::make('pages.portfolio');
	}

	public function sayHello($name)
	{
		$data = array ('name' => $name);
		return View::make('temp.my-first-view')->with($data);
	}
}
