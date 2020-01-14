<?php

use Illuminate\Http\Request;
use App\Post;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('posts', function() {
    return Post::all();
});

// Route::get('posts/{id}', function($id){
//     return Post::findOrFail($id);
// });

// Route::post('posts', function(Request $request){
//     return Post::create($request->all);
// });

// Route::put('posts/{id}', function($id){
//     $post = Post::findOrFail($id);
//     $post->update($request->all());
//     return $post;
// });

// Route::delete('post/{id}', function($id){
//     Post::find($id)->delete();
//     return 204;
// });

Route::get('posts', 'PostsController@index');
Route::get('posts/{post}', 'PostsController@show');
Route::post('posts', 'PostsController@store');
Route::put('posts/{post}', 'PostsController@update');
Route::delete('posts/{post}', 'PostsController@delete');