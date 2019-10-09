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

use \App\{Post, PostImage};

Route::get('/', function () {
    //$users = \App\User::all();
    return view('welcome', ['test' => 'Nanderson']);
});

Route::get('sub', function(){
    $posts =  Post::addSelect([
        'thumb' => PostImage::select('image')
                            ->whereColumn('post_id', 'posts.id')
                            ->limit(1)
    ])->get();

    return $posts;
});

Route::get('lazy-collections', function(){
    $posts = Post::cursor(); //Retornar pra gente uma LazyCollection...
    //dd($posts);
    foreach($posts as $post){
        print $post->title . '<br>';
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
