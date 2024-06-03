<?php

Route::group(['middleware' => ['auth', 'activated', 'currentUser', 'activity', 'twostep', 'checkblocked']], function () {

    // User Profile and Account Routes
    Route::resource(
        'profile',
        'ProfilesController',
        [
            'only' => [
                'show',
                'edit',
                'update',
                'create',
            ],
        ]
    );
    Route::put('profile/{username}/updateUserAccount', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@updateUserAccount',
    ]);
    Route::put('profile/{username}/updateUserPassword', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@updateUserPassword',
    ]);
    Route::delete('profile/{username}/deleteUserAccount', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@deleteUserAccount',
    ]);

    // Route to show user avatar
    Route::get('images/profile/{id}/avatar/{image}', [
        'uses' => 'ProfilesController@userProfileAvatar',
    ]);

    // Route to upload user avatar.
    Route::post('avatar/upload', ['as' => 'avatar.upload', 'uses' => 'ProfilesController@upload']);

    Route::name('user.')->prefix('user')->group(function () {
        Route::get('/contact', [App\Http\Controllers\User\HomeController::class, 'contact'])->name('contact');

        Route::name('order.')->prefix('order')->group(function () {
            Route::get('/list', [App\Http\Controllers\User\OrderController::class, 'browse'])->name('list');
            Route::get('/create', [App\Http\Controllers\User\OrderController::class, 'create'])->name('create');
            Route::post('/insert', [App\Http\Controllers\User\OrderController::class, 'insert'])->name('insert');
        });
    });
});
