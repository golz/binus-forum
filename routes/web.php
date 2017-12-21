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

Route::group(['middleware' => 'guest'], function(){
    // Login Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');

    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

});

Route::group(['middleware' => 'auth'], function(){
    // Logout Routes...
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    Route::group(['prefix' => 'topic'], function(){
        //Searach Thread and Reply
        Route::get('{id}/search', 'SearchController@searchAll');

        //Insert Thread
        Route::get('{id}/threadEditor', 'ThreadController@showThreadForm');
        Route::post('{id}/postThread', 'ThreadController@store');
        //Update Thread
        Route::get('{topicId}/thread/{id}/edit', 'ThreadController@showEditThreadForm');
        Route::post('{topicId}/thread/{id}/edit','ThreadController@edit');
        //Delete Thread
        Route::get('{topicId}/thread/{id}/delete', 'ThreadController@destroy');
        //Close Thread
        Route::get('{topicId}/thread/{id}/close', 'ThreadController@close');

        //Insert Reply
        Route::get('{topicId}/thread/{id}/replyEditor', 'ThreadController@showReplyForm');
        Route::post('{topicId}/thread/{id}/postReply', 'ThreadController@reply');
        //Update Reply
        Route::get('{topicId}/thread/{threadId}/reply/{id}/edit', 'ThreadController@showEditReplyForm');
        Route::post('{topicId}/thread/{threadId}/reply/{id}/edit', 'ThreadController@editReply');
        //Delete Reply
        Route::get('{topicId}/thread/{threadId}/reply/{id}/delete', 'ThreadController@destroyReply');
    });
    Route::group(['prefix' => 'user'], function(){
        //View Profile
        Route::get('profile/{id}', 'ProfileController@index');

        //Search Thread and Reply by User
        Route::get('profile/{id}/search', 'SearchController@searchByUser');

        //Control Panel
        Route::group(['prefix' => 'cpanel'],function(){
            //Profile
            Route::get('profile', 'ProfileController@profile');
            Route::post('profile', 'ProfileController@editProfile');
            //Signature
            Route::get('signature', 'ProfileController@signature');
            Route::post('signature', 'ProfileController@editSignature');
            //Avatar
            Route::get('avatar', 'ProfileController@avatar');
            Route::post('avatar', 'ProfileController@editAvatar');
            //Account Setting
            Route::get('accountSetting', 'ProfileController@accountSetting');
            Route::post('accountSetting', 'ProfileController@editAccountSetting');
        });

    });
});

Route::group(['middleware' => 'admin'], function () {

    Route::get('/clear-cache', 'UtilityController@clearCache');

});



