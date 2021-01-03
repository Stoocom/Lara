<?php
//phpinfo();



use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CategoryOfNewsController;
use \App\Http\Controllers\DbController;
//use \App\Http\Controllers\Admin\NewsController;
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
//use ($text, $title)


Route::get('/', function () {
    // $name = 'Alexander';
    return view('welcome', ['param' => $name = "Guest!"]);

});

Route::get('/about', function () {
    $name = 'Alexander';
    return view('about_page', ['param' => $name = "Some information about our project!"]);
});

Route::group([
    'prefix' => 'news',
    'as' => 'news::',
], function () {
    Route::get('/', [
        'uses' => '\App\Http\Controllers\NewsController@index'])
        ->name('categories');;
    //'uses' => [NewsController::class, 'index'] 
    //]);
    Route::get('/card/{id}', [
        'uses' => '\App\Http\Controllers\NewsController@getOneNews'])
        ->name('news-one');
    Route::get('/{categoryId}', [ 
        'uses' => '\App\Http\Controllers\NewsController@list'])
        ->name('list');
});

Route::get('/welcome', [
    'uses' => '\App\Http\Controllers\WelcomePageController@index'])
->where('userName', '[a-9]+')->name('home');

Route::get('/about', [
    'uses' => '\App\Http\Controllers\AboutPageController@index'])
    ->name('about');
/*
Route::get('/news/{id}', [
    'uses' => '\App\Http\Controllers\NewsController@getOneNews',
    'as' => 'news-one',
]);
*/
Route::get('admin/news/create', [
    'uses' => '\App\Http\Controllers\Admin\NewsController@createView'])
    ->name('create');

Route::post('admin/news/create', [
    'uses' => '\App\Http\Controllers\Admin\NewsController@create'])
    ->name('create_action');

Route::get('admin/category/create', [
    'uses' => '\App\Http\Controllers\Admin\CategoryController@createView'])
    ->name('create');
    
Route::post('admin/category/create', [
    'uses' => '\App\Http\Controllers\Admin\CategoryController@create'])
    ->name('create_action');


Route::get('/db', [DbController::class, 'index']);