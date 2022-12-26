<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Bikin users
        User::create([
            'name' => 'Mario',
            'username' => 'mario',
            'email' => 'mario@gmail.com',
            'password' => bcrypt('admin')
        ]);

        User::factory(3)->create();
        // Bikin categories
        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming',
        ]);
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);
        Category::create([
            'name' => 'Sport',
            'slug' => 'sport',
        ]);
        // Bikin posts
        Post::factory(30)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque, natus.',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus facere in nam ipsum qui quam culpa architecto, iure impedit, sapiente exercitationem facilis nisi voluptas velit ipsam ducimus tempora, at et accusamus dicta tenetur non ea ut maxime. Temporibus, ipsam, eos pariatur aspernatur laboriosam necessitatibus quasi accusantium dolorum ad amet reprehenderit adipisci consequatur incidunt aperiam veritatis optio voluptatem quos asperiores earum!',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque, natus.',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus facere in nam ipsum qui quam culpa architecto, iure impedit, sapiente exercitationem facilis nisi voluptas velit ipsam ducimus tempora, at et accusamus dicta tenetur non ea ut maxime. Temporibus, ipsam, eos pariatur aspernatur laboriosam necessitatibus quasi accusantium dolorum ad amet reprehenderit adipisci consequatur incidunt aperiam veritatis optio voluptatem quos asperiores earum!',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque, natus.',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus facere in nam ipsum qui quam culpa architecto, iure impedit, sapiente exercitationem facilis nisi voluptas velit ipsam ducimus tempora, at et accusamus dicta tenetur non ea ut maxime. Temporibus, ipsam, eos pariatur aspernatur laboriosam necessitatibus quasi accusantium dolorum ad amet reprehenderit adipisci consequatur incidunt aperiam veritatis optio voluptatem quos asperiores earum!',
        //     'category_id' => 3,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'Judul Keempat',
        //     'slug' => 'judul-keempat',
        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque, natus.',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus facere in nam ipsum qui quam culpa architecto, iure impedit, sapiente exercitationem facilis nisi voluptas velit ipsam ducimus tempora, at et accusamus dicta tenetur non ea ut maxime. Temporibus, ipsam, eos pariatur aspernatur laboriosam necessitatibus quasi accusantium dolorum ad amet reprehenderit adipisci consequatur incidunt aperiam veritatis optio voluptatem quos asperiores earum!',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);
    }
}
