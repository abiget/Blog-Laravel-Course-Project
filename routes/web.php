<?php

use App\Models\Category;
use App\Models\User;
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
    //Get all posts and pass them to a view called 'posts
    $posts = Post::latest()->with(['category', 'author'])->get();

    return view('posts', [
        'posts' => $posts
    ]);
});

Route::get('posts/{post:slug}', function (Post $post){
    // Find a post by its id and pass it to a view called 'post'
    return view('post',[
        'post'=> $post
    ]);
});

Route::get('categories/{category:slug}', function (Category $category){
    //find posts associated with a category by its id and pass it to a view called 'posts'
    return view('posts', [
        'posts' => $category->posts->load(['author', 'category'])
    ]);
});

Route::get('authors/{author:username}', function (User $author){
    //find posts associated with a category by its id and pass it to a view called 'posts'
    return view('posts', [
        'posts' => $author->posts->load(['author', 'category'])
    ]);
});