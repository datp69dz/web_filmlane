<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;

class Account extends Model implements Authenticatable, CanResetPassword
{
    use CanResetPasswordTrait;
    use Notifiable;

    protected $table = 'accounts';

    protected $primaryKey = 'account_id';

    protected $fillable = [
        'username',
        'password',
        'email',
        'account_type',
        'image',
        'verification_token',
        'account_date',
        'account_update',
    ];

    

    public function payments()
    {
        return $this->hasMany(Payment::class, 'account_id', 'account_id');
    }

    public function favorites()
    {
        return $this->belongsToMany(Movie::class, 'favorites', 'account_id', 'movie_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'account_id', 'account_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'account_id', 'account_id');
    }

    public $timestamps = false;

    protected $dates = [
        'account_date',
        'account_update',
    ];

    protected $dateFormat = 'Y-m-d H:i:s';

    public function getAuthIdentifierName()
    {
        return 'account_id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
