<?php

use App\Http\Controllers\PostController;
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

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);

// Route::get('categories/{category:slug}', function (Category $category){
//     //find posts associated with a category by its id and pass it to a view called 'posts'
//     return view('posts', [
//         'posts' => $category->posts->load(['author', 'category']),
//         'currentCategory' => $category,
//         'categories' => Category::all()
//     ]);
// })->name('category');

// Route::get('authors/{author:username}', function (User $author){
//     //find posts associated with a category by its id and pass it to a view called 'posts'
//     return view('posts.index', [
//         'posts' => $author->posts->load(['author', 'category']),
//     ]);
// });