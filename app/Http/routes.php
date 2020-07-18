<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Post;
use App\Tag;
use App\Video;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/create', function () {
    $post = Post::create(['name'=>'My First Post']);

    $tag =Tag::find(1);
    $post->tags()->save($tag);


    $tag2 =Tag::find(2);
    $video = Video::create(['name'=>'My Video.mp4']);
    $video->tags()->save($tag2);

    $video2 = Video::create(['name'=>'My Video 02.mp4']);
    $video2->tags()->save($tag2);

});


Route::get('/update', function () {
    $post = Post::find(1);

   /* foreach ($post->tags as $tag){
        return $tag->whereName("Php")->update(['name'=>'PHP']);
    }*/


    //$post->tags()->attach([2,3]);
   // $post->tags()->sync([1]);
});


Route::get('/delete', function () {
    $post = Post::find(1);

    foreach ($post->tags as $tag){
        $tag->whereName('Android')->delete();
    }
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
