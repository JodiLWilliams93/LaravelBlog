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

Route::get('/', [
    'uses' => 'PostController@getIndex',
    'as' => 'blog.index'
]);

Route::get('post/{id}', [
    'uses' => 'PostController@getPost',
    'as' => 'blog.post'
]);

Route::get('post/{id}/like', [
    'uses' => 'PostController@getLikePost',
    'as' => 'blog.post.like'
]);

Route::get('about', function() {
    return view('other.about');
})->name('other.about');

Route::get('tutorial', [
    'uses' => 'TutorialController@getIndex',
    'as' => 'tutorial.index'
]);

Route::get('guide/{id}', [
    'uses' => 'TutorialController@getTutorial',
    'as' => 'tutorial.guide'
]);

Route::get('guide/{id}/thumbsUp', [
    'uses' => 'TutorialController@getTutorialThumbsUp',
    'as' => 'tutorial.guide.thumbsup'
]);

Route::get('guide/{id}/thumbsDown', [
    'uses' => 'TutorialController@getTutorialThumbsDown',
    'as' => 'tutorial.guide.thumbsdown'
]);

Route::group(['prefix' => 'admin'], function() {
    Route::get('', [
        'uses' => 'PostController@getAdminIndex',
        'as' => 'admin.index'
    ]);
    
    Route::get('create', [
        'uses' => 'PostController@getAdminCreate',
        'as' => 'admin.create'
    ]);
    
    Route::post('create', [
        'uses' => 'PostController@postAdminCreate',
        'as' => 'admin.create'
    ]);
    
    Route::get('edit/{id}', [
        'uses' => 'PostController@getAdminEdit',
        'as' => 'admin.edit'
    ]);
    
    Route::get('delete/{id}', [
        'uses' => 'PostController@getAdminDelete',
        'as' => 'admin.delete'
    ]);

    Route::post('edit', [
        'uses' => 'PostController@postAdminUpdate',
        'as' => 'admin.update'
    ]);

    Route::get('tutorialCreate', [
        'uses' => 'TutorialController@getTutorialCreate',
        'as' => 'admin.tutorialCreate'
    ]);

    Route::post('tutorialCreate', [
        'uses' => 'TutorialController@postTutorialCreate',
        'as' => 'admin.tutorialCreate'
    ]);

    Route::get('tutorialList', [
        'uses' => 'TutorialController@getTutorialList',
        'as' => 'admin.tutorialList'
    ]);

    Route::get('tutorialEdit/{id}', [
        'uses' => 'TutorialController@getTutorialEdit',
        'as' => 'admin.tutorialEdit'
    ]);

    Route::post('tutorialEdit', [
        'uses' => 'TutorialController@postTutorialUpdate',
        'as' => 'admin.tutorialUpdate'
    ]);

    Route::get('tutorialDelete/{id}', [
        'uses' => 'TutorialController@getTutorialDelete',
        'as' => 'admin.tutorialDelete'
    ]);

});


Auth::routes();

Route::post('login', [
    'uses' => 'SigninController@signin',
    'as' => 'auth.signin'
]);