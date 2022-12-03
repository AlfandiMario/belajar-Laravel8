<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;



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

// Menggunakan Closure
Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        'active' => 'home',
    ]);
});

// Bisa juga return string
// Route::get('/home', function () {
//     return 'Halaman Home';
// });
Route::get('/about', function () {
    return view('about', [
        // Data dikirim dari route ke halaman about
        // Bentuknya assosiatif array 
        "nama" => "Mario Alfandi",
        "email" => "mario@mail.com",
        "image" => "mario.jpeg",
        "title" => "About",
        'active' => 'about',
    ]);
});
// Menampilkan semua kategori
Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

// Menggunakan Controller
Route::get('/blog', [PostController::class, 'index']);

// Halaman single post dengan Route Model Binding
// Variabel yang dikirim adalah 'post'
Route::get('blog/{post:slug}', [PostController::class, 'show']);

// SUDAH DITANGANI MODEL DAN CONTROLLER
// category di :slug harus sama dengan $category
// Parameter yang dikirim adalah slug
// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('blog', [
//         'title' => "Post by Category : $category->name",
//         'active' => 'categories',
//         'posts' => $category->posts->load('category', 'author'),
//     ]);
// });

// // parameter yang dikirim adalah username
// Route::get('/authors/{author:username}', function (User $author) {
//     return view('blog', [
//         'title' => "Post by Author L : $author->name",
//         'active' => 'blog',
//         // Lazy eager loading
//         'posts' => $author->posts->load('category', 'author'),
//     ]);
// });

// Route bernama 'login'
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// DASHBOARD
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);
Route::resource('dashboard/posts', DashboardPostController::class)->middleware('auth');
// Membuat route kecuali method show
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');
// Apabila memakai Gate
// Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show');
