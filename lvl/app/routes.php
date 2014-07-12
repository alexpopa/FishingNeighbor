<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/
/* Dependencies */
Route::resource('location', 'LocationController');

/* Facebook Routes */

Route::get('login/fb', function() {
    $facebook = new Facebook(Config::get('facebook'));
    $params = array(
        'redirect_uri' => url('/login/fb/callback'),
        'scope' => 'email',
    );
    return Redirect::away($facebook->getLoginUrl($params));
});

Route::get('login/fb/callback', function() {
    $code = Input::get('code');
    if (strlen($code) == 0) return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');

    $facebook = new Facebook(Config::get('facebook'));
    $uid = $facebook->getUser();

    if ($uid == 0) return Redirect::to('/')->with('message', 'There was an error');

    $me = $facebook->api('/me');

    $profile = Profile::whereUid($uid)->first();
    if (empty($profile)) {

        $user = new User;
        $user->name = $me['first_name'].' '.$me['last_name'];
        $user->email = $me['email'];
        $user->photo = 'https://graph.facebook.com/'.$me['id'].'/picture?type=small';

        $user->save();

        $profile = new Profile();
        $profile->uid = $uid;
        $profile->username = $me['name'];
        $profile = $user->profiles()->save($profile);
    }

    $profile->access_token = $facebook->getAccessToken();
    $profile->save();

    $user = $profile->user;

    Auth::login($user);

    return Redirect::to('location');
});

Route::get('logout', function() {
    Auth::logout();
    return Redirect::to('/');
});

/* Homepage Route */

Route::get('/', 'HomeController@showWelcome');

/* Main Page Route */

Route::get('location', array('before' => 'auth', 'uses' => 'HomeController@showLocation'));

/* New Location Route */

Route::get('newLocation', array('before' => 'auth', 'uses' => 'HomeController@newLocation'));

/* All Locations */

Route::get('thislocation', array('before' => 'auth', 'uses' => 'HomeController@thisLocation'));
