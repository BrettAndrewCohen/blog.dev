<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('temp.my-first-view');
});

Route::get('orm-test', function () {
    $post = new Post();
    $post1 = new Post();
    $post1->title = "Eloquent is awesome!";
    $post1->body = "It is super easy to create a new post.";
    $post1->save();
});

Route::get('/', 'HomeController@showWelcome');
Route::get('/portfolio', 'HomeController@Portfolio');
Route::get('/resume', 'HomeController@Resume');
Route::get('/sayhello/{name}', 'HomeController@sayHello');
Route::resource('posts', 'PostsController');

// Route::get('/sayhello/{name}', function($name)
// {
//     if ($name == "Brett")
//     {
//         return Redirect::to('/');
//     }
//     else
//     {
//         return View::make('temp.my-first-view')->with('name', $name);
//     }
// });

// Route::get('/rolldice/{guess}', function($guess)
// {   
//     $random = rand(1,6);
//     $data = array('user_guess' => $guess, 'random_guess' => $random);
//     return View::make('temp.roll-dice')->with($data);
// });



