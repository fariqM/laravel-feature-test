<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::prefix('home')->group(function () {
            Route::get('', 'ProfileController@homePage')->name('home');
            Route::get('edit-profile', 'ProfileController@showProfile')->name('profile');
            Route::post('edit-profile', 'ProfileController@updateProfile')->name('u.profile');
            Route::delete('delete-profile/{user:id}', 'ProfileController@destroy')->name('d.acc');
        });
        Route::post('/logout', 'LoginController@logoutAction')->name('logout');
    });
    Route::middleware('guest')->group(function () {
        Route::view('tes', 'profile');

        //.::-----Cara Menampilkan Halaman----::.//
        // cara 1
        Route::view('/', 'welcome')->name('landing');

        // cara ke 2
        Route::get('/login', function () {
            return view('login');
        });

        // Cara 3
        Route::get('/register', 'RegisterController@showPage');
        /////-----------/////

        Route::post('/login', 'LoginController@loginAction')->name('login');
        Route::post('/register', 'RegisterController@storeUser')->name('register');
    });
});
