<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    //Get all posts and pass them to a view called 'posts'
    $posts = Post::all();

    return view('posts', [
        'posts' => $posts
    ]);
});

Route::get('/posts/{post}', function ($slug){
    // Find a post by its slug and pass it to a view called 'post'
    return view('post',[
        'post'=> Post::find($slug)
    ]);
})->where('post', '[A-z_\-]+');