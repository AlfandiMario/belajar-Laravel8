<?php

namespace App\Models;

// Untuk connect ke DB
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post
{
    private static $blog_posts = [
        [
            "title" => "Judul Post 1",
            "slug" => "judul-post-1",
            "author" => "Mario",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti quibusdam labore unde animi pariatur corporis illo sunt fugiat voluptas excepturi consequatur corrupti illum commodi, voluptatem at exercitationem sit explicabo distinctio! Exercitationem cum doloremque itaque dolore eos necessitatibus officia ipsa rerum. Reiciendis maiores ex obcaecati. Et aspernatur voluptates enim aliquam, reiciendis aliquid, officia reprehenderit amet quas explicabo impedit veritatis ducimus necessitatibus error incidunt earum facere eos maxime voluptas porro optio! Natus et aspernatur similique officia accusantium nihil saepe cum non suscipit?"
        ],
        [
            "title" => "Judul",
            "slug" => "judul-post-2",
            "author" => "Dodi",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti quibusdam labore unde animi pariatur corporis illo sunt fugiat voluptas excepturi consequatur corrupti illum commodi, voluptatem at exercitationem sit explicabo distinctio! Exercitationem cum doloremque itaque dolore eos necessitatibus officia ipsa rerum. Reiciendis maiores ex obcaecati. Et aspernatur voluptates enim aliquam, reiciendis aliquid, officia reprehenderit amet quas explicabo impedit veritatis ducimus necessitatibus error incidunt earum facere eos maxime voluptas porro optio! Natus et aspernatur similique officia accusantium nihil saepe cum non suscipit?obcaecati. Et aspernatur voluptates enim aliquam, reiciendis aliquid, officia reprehenderit amet quas explicabo impedit veritatis ducimus necessitatibus error incidunt earum facere eos maxime voluptas porro optio! Natus et aspernatur similique officia accusantium nihil saepe cum non suscipi"
        ]
    ];

    public static function all()
    {
        // Karena properti static pakainya self::
        // return self::$blog_posts;
        // Kalau properti biasa pakai $this->

        // Merubah yang tadinya array biasa jadi collections
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        // Ambil dari $blog_posts
        $posts = static::all();

        // Tidak butuh karena menggunakan collection
        // $post = [];
        // // Setiap $post sebagai $p
        // foreach ($posts as $p) {
        //     // Jika slugnya sama, maka isikan $p ke $post
        //     if ($p["slug"] === $slug) {
        //         $post = $p;
        //     }
        // }

        // Diganti dengan 
        return $posts->firstWhere('slug', $slug);
    }
}
