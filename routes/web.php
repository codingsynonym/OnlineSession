<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: *');

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */
//Route::group(['middleware' => ['web']], function () {
//    
//});
//Route::get('/', 'Web\Home@index');
Route::get('/', function() {
    echo "<h1><center>Welcome </center></h1>";
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('/meeting/join', 'Admin\Zoom@index');
    // Route::get('/meeting', 'Admin\Zoom@index');
    Route::get('/meeting-detail', 'Admin\Zoom\MeetingDetail@index');
    Route::post('/meeting-detail/{id?}', 'Admin\Zoom\MeetingDetail@create')->where(['id' => '[0-9]+']);
    // Route::get('/meeting-detail/{id?}', 'Admin\Zoom\MeetingDetail@create')->where(['id' => '[0-9]+']);
    Route::get('/meet/{params?}', 'Admin\Zoom@meet')->where('params', '(.*)');
	
	 // Events
    Route::get('/events', 'Admin\Events@index');
    Route::post('/events/add', 'Admin\Events@addEvent');
    Route::post('/events_ajax_update', 'Admin\Events@ajaxUpdate');
    Route::post('/events_ajax_update_loc', 'Admin\Events@ajaxUpdateLoc');
    Route::post('/events_ajax_delete', 'Admin\Events@ajaxDelete');
});
