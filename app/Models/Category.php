<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    public $timestamps = false;

    protected $fillable = [
    'category_name',
    'description',
    'category_date',
    'category_update'];

    protected $dates = [
        'category_date',
        'category_update',
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
