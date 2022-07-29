<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\PostController::class, 'index']);

Route::get('blog', function(){
    // consulta a la base de datos
    $posts = [
        [ 'id' => 1, 'title' => 'PHP', 'slug' => 'php' ],
        [ 'id' => 2, 'title' => 'laravel', 'slug' => 'laravel' ]
    ];
    return view('blog', ['posts' => $posts]);
});

Route::get('blog/{slug}', function($slug){
    // consulta a la base de datos
    $post = $slug;
    return view('post', ['post' => $post]);
});
