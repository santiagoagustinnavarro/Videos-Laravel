<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/crear-video',array(
    'as'=>'createVideo',
    'middleware'=>'auth',
    'uses'=>'App\Http\Controllers\VideoController@createVideo'
    )
);

Route::post('/guardar-video',array(
    'as'=>'saveVideo',
    'middleware'=>'auth',
    'uses'=>'App\Http\Controllers\VideoController@saveVideo'
    )
);
Route::get('/miniatura/{filename}',array(
    'as'=>'imageVideo',
    'uses'=>'App\Http\Controllers\VideoController@getImage'
)
);

Route::get('/video/{video_id}',array(
    'as'=>'detailVideo',
    'uses'=>'App\Http\Controllers\VideoController@getVideoDetail'
));

Route::get('/videoFile/{fileName}',array(
    'as'=>'fileVideo',
    'uses'=>'App\Http\Controllers\VideoController@getVideo'
));

Route::post('/comment',array(
    'as'=>'comment',
    'middleware'=>'auth',
    'uses'=>'App\Http\Controllers\CommentController@store'
));

Route::get('/delete-comment/{comment_id}',array(
    'as'=>'commentDelete',
    'middleware'=>'auth',
    'uses'=>'App\Http\Controllers\CommentController@delete'
));

Route::get('/delete-video/{video_id}',array(
    'as'=>'videoDelete',
    'middleware'=>'auth',
    'uses'=>'App\Http\Controllers\VideoController@delete'
));

Route::get('/editar-video/{video_id}',array(
    'as'=>'videoEdit',
    'middleware'=>'auth',
    'uses'=>'App\Http\Controllers\VideoController@edit'
));

Route::post('/update-video/{video_id}',array(
    'as'=>'videoUpdate',
    'middleware'=>'auth',
    'uses'=>'App\Http\Controllers\VideoController@update')
);

Route::get('/buscar/{search?}/{filter?}',array(
    'as'=>'videoSearch',
    'uses'=>'App\Http\Controllers\VideoController@search'
)
);
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::get('/canal/{user_id}',array(
    'as'=>'channel',
    'uses'=>'App\Http\Controllers\UserController@channel'
));

/*Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/
