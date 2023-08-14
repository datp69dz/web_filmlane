<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


use Illuminate\Contracts\Auth\Authenticatable;

class AdminAccount extends Model implements Authenticatable
{
    // ...
    
    public function getAuthIdentifierName()
    {
        return 'admin_id'; // Thay thế bằng khóa chính của bảng admin_accounts
    }

    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return null; // Không sử dụng "remember_token"
    }

    public function setRememberToken($value)
    {
        // Không sử dụng "remember_token"
    }

    public function getRememberTokenName()
    {
        return null; // Không sử dụng "remember_token"
    }

    protected $table ='admin_accounts';
    protected $primaryKey = 'admin_id';
    public $timestamps = false;

    protected $fillable = ['admin_username', 'password', 'email', 'image' , 'admin_date' , 'admin_update'];

    protected $dates = [
        'admin_date',
        'admin_update',
    ];  

    public function movies()
    {
        return $this->hasMany(Movie::class, 'admin_id', 'admin_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'admin_id', 'admin_id');
    }
    
}
