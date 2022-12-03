<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if (request('kategori')) {
            $category = Category::firstWhere('slug', request('kategori'));
            $title = ' in ' . $category->name;
        }
        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }


        return view('blog', [
            "title" => "All Posts" . $title,
            "active" => 'blog',
            // Ambil dari Models method all
            // "posts" => Post::all(),

            // Eager Loading
            "posts" => Post::latest()->filter(request(['search', 'kategori', 'author']))->paginate(7)->withQueryString(),
            // Kirim parameter ke model
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => "Single Post",
            "active" => 'blog',
            "post" => $post
        ]);
    }
}
