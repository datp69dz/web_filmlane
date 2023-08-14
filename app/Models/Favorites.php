<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{

    protected $table='favorites';
    protected $primaryKey = 'favorite_id';
    public $timestamps = false;

    protected $fillable = ['account_id', 'movie_id' , 'favorite_date' , 'favorite_update'];

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id', 'account_id');
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id', 'movie_id');
    }
}
