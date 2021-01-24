<?php
//phpinfo();



use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CategoryOfNewsController;
use \App\Http\Controllers\DbController;
//use Illuminate\Support\Facades\Auth;
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


// Route::get('/', function () {
//     // $name = 'Alexander';
//     return view('welcome', ['param' => $name = "Guest!"]);
// });

Route::get('/about', function () {
    $name = 'Alexander';
    return view('about_page', ['param' => $name = "Some information about our project!"]);
});

Route::group([
    'prefix' => 'news',
    'as' => 'news::',
], function () {
    Route::get('/', [
        'uses' => '\App\Http\Controllers\NewsController@index'
    ])
        ->name('categories');
    //'uses' => [NewsController::class, 'index'] 
    //]);
    Route::get('/card/{id}', [
        'uses' => '\App\Http\Controllers\NewsController@getOneNews'
    ])
        ->name('news-one');
    Route::get('/{categoryId}', [
        'uses' => '\App\Http\Controllers\NewsController@list'
    ])
        ->name('list');
});

Route::get('/welcome', [
    'uses' => '\App\Http\Controllers\WelcomePageController@index'
])->where('userName', '[a-9]+')->name('home');

Route::get('/about', [
    'uses' => '\App\Http\Controllers\AboutPageController@index'
])->name('about');




Route::get('/admin', [
    'uses' => '\App\Http\Controllers\Admin\NewsController@index'
])->name('admin111')->middleware(['auth', 'is.admin']);

Route::get('admin/category/update/{id}', [
    'uses' => '\App\Http\Controllers\Admin\CategoryController@updateView'
])->name('admin_category')->middleware(['auth', 'is.admin']);

Route::post('admin/category/update/{id}', [
    'uses' => '\App\Http\Controllers\Admin\CategoryController@update'
])->name('admin_category_action')->middleware(['auth', 'is.admin']);

Route::get('admin/lang/{lang}', [
    'uses' => '\App\Http\Controllers\Admin\LangChangeController@index'
])->name('lang')->middleware(['auth', 'is.admin']);



Route::get('/admin/news', [
    'uses' => '\App\Http\Controllers\Admin\NewsController@indexNews'
])->name('admin_news')->middleware(['auth', 'is.admin']);

Route::get('/admin/news/update/{id}', [
    'uses' => '\App\Http\Controllers\Admin\NewsController@updateView'
])->name('admin_news_update')->middleware(['auth', 'is.admin']);

Route::post('/admin/news/update/{id}', [
    'uses' => '\App\Http\Controllers\Admin\NewsController@update'
])->name('admin_news_update_action')->middleware(['auth', 'is.admin']);



Route::get('admin/news/create', [
    'uses' => '\App\Http\Controllers\Admin\NewsController@createView'
])->name('news_create')->middleware(['auth', 'is.admin']);

Route::post('admin/news/create', [
    'uses' => '\App\Http\Controllers\Admin\NewsController@create'
])->name('news_create_action')->middleware(['auth', 'is.admin']);



Route::get('admin/category/create', [
    'uses' => '\App\Http\Controllers\Admin\CategoryController@createView'
])->name('category_create')->middleware(['auth', 'is.admin']);

Route::post('admin/category/create', [
    'uses' => '\App\Http\Controllers\Admin\CategoryController@create'
])->name('category_create_action')->middleware(['auth', 'is.admin']);


Route::get('/db', [DbController::class, 'index']);

Route::get('login', '\App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', '\App\Http\Controllers\Auth\LoginController@login');
Route::post('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout')->middleware(['auth']);

Route::match(['get', 'post'], '/admin/profile/update', 
'\App\Http\Controllers\Admin\ProfileController@update')
->name('profile_update')->middleware(['auth', 'is.admin']);


//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
