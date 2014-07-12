<?php

class LocationController extends BaseController {
	
	public function store()
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'country'       => 'required',
			'state'         => 'required',
			'city'          => 'required',
			'name'          => 'required',
			'directions'    => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('/newLocation')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$location = new Location;
			$location->country       = Input::get('country');
			$location->state         = Input::get('state');
			$location->city          = Input::get('city');
			$location->name          = Input::get('name');
			$location->directions    = Input::get('directions');
			$location->save();

			// redirect
			Session::flash('message', 'Successfully created a location!');
			return Redirect::to('/location');
		}
	}

}
