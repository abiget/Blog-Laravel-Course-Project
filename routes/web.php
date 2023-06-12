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
    $posts = Post::latest();
    //Get all posts and pass them to a view called 'posts
    if(request('search')){
        $posts->where('title', 'like', '%' . request('search') . '%')
              ->orWhere('body', 'like', '%' . request('search') . '%') ;
    }

    return view('posts', [
        'posts' => $posts->get(),
        'categories' => Category::all()
    ]);
})->name('home');

Route::get('posts/{post:slug}', function (Post $post){
    // Find a post by its id and pass it to a view called 'post'
    return view('post',[
        'post'=> $post,
    ]);
});

Route::get('categories/{category:slug}', function (Category $category){
    //find posts associated with a category by its id and pass it to a view called 'posts'
    return view('posts', [
        'posts' => $category->posts->load(['author', 'category']),
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);
})->name('category');

Route::get('authors/{author:username}', function (User $author){
    //find posts associated with a category by its id and pass it to a view called 'posts'
    return view('posts', [
        'posts' => $author->posts->load(['author', 'category']),
        'categories' => Category::all()
    ]);
});