<?php

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('topic/{id}', 'TopicController@index');
Route::get('topic/{topicId}/thread/{id}', 'ThreadController@index');

Route::group(['middleware' => 'auth'], function(){
    //Insert Thread
    Route::get('topic/{id}/threadEditor', 'ThreadController@showThreadForm');
    Route::post('topic/{id}/postThread', 'ThreadController@store');

    //Update Thread
    Route::get('topic/{topicId}/thread/{id}/edit', 'ThreadController@showEditThreadForm');
    Route::post('topic/{topicId}/thread/{id}/edit','ThreadController@edit');

    //Delete Thread
    Route::get('topic/{topicId}/thread/{id}/delete', 'ThreadController@destroy');

    //Close Thread
    Route::get('topic/{topicId}/thread/{id}/close', 'ThreadController@close');

    //Insert Reply
    Route::get('topic/{topicId}/thread/{id}/replyEditor', 'ThreadController@showReplyForm');
    Route::post('topic/{topicId}/thread/{id}/postReply', 'ThreadController@reply');

    //Update Reply
    Route::get('topic/{topicId}/thread/{threadId}/reply/{id}/edit', 'ThreadController@showEditReplyForm');
    Route::post('topic/{topicId}/thread/{threadId}/reply/{id}/edit', 'ThreadController@editReply');

    //Delete Reply
    Route::get('topic/{topicId}/thread/{threadId}/reply/{id}/delete', 'ThreadController@destroyReply');
});

Route::group(['middleware' => 'admin'], function () {

});


Route::get('/clear-cache', 'UtilityController@clearCache');

// Login Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
