<?php
// route/web.php
Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' =>['web']], function()
{
 route::resource('blog','BlogController');
 Route::post ( '/editItem', 'BlogController@editItem' );
 Route::post ( '/addItem', 'BlogController@addItem' );
 Route::post ( '/deleteItem', 'BlogController@deleteItem' );
});
Route::group(['middleware' =>['web']], function()
{
  route::resource('yogi','YogiController');
  route::post ('/editItemyogi','YogiController@editItemyogi');
  route::post ('/addItemyogi','YogiController@addItemyogi');
  route::post ('/deleteItemyogi','YogiController@deleteItemyogi');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
