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

Route::get('/', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::get('/ask', 'HomeController@ask');
Route::get('/show/{id}/{episode?}', 'HomeController@show');
Route::get('/feel_me/{id}/{episode?}', 'HomeController@feel_me');

Route::prefix('/admin')->group(function() {

  Auth::routes();

});

Route::middleware('auth')->prefix('/admin')->group(function() {

  Route::get('/', 'CmsController@index')->name('admin.index');

  Route::view('/profile_picture', 'cms.users.profile_picture')->name('profile_picture.index');

  Route::post('/profile_picture', 'CmsController@updateProfilePicture')->name('profile_picture.update');

  Route::post('/episode_picture/{episode}', 'EpisodeController@updatePicture')->name('episode_picture.update');

  Route::get('/series_categories/{seriesCategory}/series', 'SeriesCategoryController@getSeries')->name('get_series');

  Route::resources([
      'series_categories' => 'SeriesCategoryController',
      'series' => 'SeriesController',
      'episodes' => 'EpisodeController',
      'question_categories' => 'QuestionCategoryController',
      'questions' => 'QuestionController',
      'answers' => 'AnswerController',
  ]);
});
