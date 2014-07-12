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
		$data = array();
	
		if (Auth::check()) {
			$data = Auth::user();
		}
		return View::make('index', array('data'=>$data));
	}
	
	public function showLocation()
	{
		$data = array();
		$locations = DB::table('locations')
                    ->orderBy('city', 'asc')
					->orderBy('name', 'asc')
					->get();
	
		if (Auth::check()) {
			$data = Auth::user();
		}
		
		return View::make('location', array('data'=>$data))
			->with('locations', $locations);
	}
	
	public function newLocation()
	{
		$data = array();
	
		if (Auth::check()) {
			$data = Auth::user();
		}
		return View::make('location-form', array('data'=>$data));
	}
	
	public function thisLocation()
	{
		$data = array();
		$id = $_GET['id'];
	
		if (Auth::check()) {
			$data = Auth::user();
		}
		return View::make('all-location', array('data'=>$data))
			->with('id', $id);
	}

}
