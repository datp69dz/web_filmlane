<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $primaryKey = 'review_id';
    public $timestamps = false;

    protected $fillable = ['account_id', 'movie_id', 'rating', 'review_date' , 'review_update'];
    
    protected $dates = [
        'review_date',
        'review_update',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id', 'account_id');
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id', 'movie_id');
    }
}
