<?php




/* App::make('App\Billing\Stripe'); resolve('App\Billing\Stripe'); 
app('App\Billing\Stripe');*/

/*$stripe = app('App\Billing\Stripe');*/

dd(resolve('App\Billing\Stripe'));


Route::get('/','PostsController@index')->name('home');

Route::get('/posts/create', 'PostsController@create');

Route::post('/posts', 'PostsController@store');

Route::get('/posts/{post}', 'PostsController@show');

Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create')->name('login');

Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');
