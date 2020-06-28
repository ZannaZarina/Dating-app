<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/profile', 'MyProfileController')->name('profile');

Route::get('/home', 'HomeController@filteredUsers')->name('filtered.users');
Route::post('/match/{user}/like', 'HomeController@like')->name('match.like');
Route::post('/match/{user}/dislike', 'HomeController@dislike')->name('match.dislike');

Route::get('/like/history', 'LikeController@likeHistory')->name('like.history');
Route::get('/match/history', 'MatchController@matchHistory')->name('match.history');


Route::get('/edit', 'EditUserProfileController')->name('profile.edit');
Route::put('/edit', 'UpdateUserProfileController')->name('profile.update');

Route::get('/preferences', 'EditPreferencesController')->name('preferences.edit');
Route::put('/preferences', 'UpdatePreferencesController')->name('preferences.update');

Route::get('/picture', 'EditProfilePictureController')->name('picture.edit');
Route::put('/picture', 'UpdateProfilePictureController')->name('picture.update');

Route::get('/users/{user}/gallery', 'MyGalleryController')->name('gallery');
Route::put('/users/{user}/gallery', 'UpdateGalleryController')->name('gallery.update');

