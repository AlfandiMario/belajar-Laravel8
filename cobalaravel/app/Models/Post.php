<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
    use HasFactory;
    use Sluggable;

    // Mana yang boleh diisi melalui mass assignment
    protected $fillable = ['title', 'slug', 'category_id', 'excerpt', 'body', 'user_id', 'image'];
    // Mana yang tidak boleh
    protected $guarded = [];
    // Load Query Category dan Author sekalian
    protected $with = ['category', 'author'];

    public $table = "posts";

    public function category()
    {
        // Relasi model Post ke Category
        // One to One
        // untuk mendapat category_id
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        // Pakai 'user_id' agar user berubah menjadi author

        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            function ($query, $search) {
                return $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%');
            }
        );
        // Versi Callback
        $query->when(
            $filters['kategori'] ?? false,
            function ($query, $kategori) {
                return $query->whereHas('category', function ($query) use ($kategori) {
                    $query->where('slug', $kategori);
                });
            }
        );
        // Versi Arrow Function
        $query->when(
            $filters['author'] ?? false,
            fn ($query, $author) => $query->whereHas(
                'author',
                fn ($query) =>
                $query->where('username', $author)
            )
        );
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Make slug from Post's Title
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
