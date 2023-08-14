<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movies';
    protected $primaryKey = 'movie_id';
    public $timestamps = false;

    protected $fillable = [
        'title', 'description', 'release_date', 'category_id', 'trailer_url',
        'image_url', 'movie_url', 'time', 'director', 'main_actor', 'status',
        'nation', 'quality', 'year_manufacture', 'view', 'admin_id', 'movie_date', 'movie_update'
    ];

    protected $dates = [
        'movie_date',
        'movie_update',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'movie_id', 'movie_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'movie_id', 'movie_id');
    }

    public function admin()
    {
        return $this->belongsTo(AdminAccount::class, 'admin_id', 'admin_id');
    }

    public function favorites()
    {
        return $this->belongsToMany(Account::class, 'favorites', 'movie_id', 'account_id');
    }
}
