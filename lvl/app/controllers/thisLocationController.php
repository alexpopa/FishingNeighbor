<?php

class thisLocationController extends BaseController {
	
	public function store()
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'content'     => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		$user_id = Input::get('user_id');
		$location_id = Input::get('location_id');
		$name = Input::get('name');
		
		// process the login
		if ($validator->fails()) {
			return Redirect::to('thislocation/'.$name)
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$comment = new Comment;
			$comment->user_id          = $user_id;
			$comment->location_id      = $location_id;
			$comment->content     	   = Input::get('content');
			$comment->save();

			// redirect
			Session::flash('message', 'Thank you for your submission.');
			return Redirect::to('thislocation/'.$name);
		}
	}

}
