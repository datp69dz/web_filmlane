<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'comment_id';
    public $timestamps = false;

    protected $fillable = ['movie_id', 'account_id', 'content', 'comment_date', 'admin_id' , 'comments_date','comments_update'];

    protected $dates = [
        'comments_date',
        'comments_update',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id', 'account_id');
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id', 'movie_id');
    }

    public function admin()
    {
        return $this->belongsTo(AdminAccount::class, 'admin_id', 'admin_id');
    }
}
