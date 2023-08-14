<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments'; // Tên bảng trong cơ sở dữ liệu

    protected $primaryKey = 'payment_id';

    protected $fillable = [
        'account_id',
        'account_money',
        'status',
        'payment_date',
        'payment_update',
        'trading_code',
    ];
    public $timestamps = false; // Vô hiệu hóa các trường timestamps mặc định (created_at, updated_at)

    protected $dates = [
        'payment_date',
        'payment_update',
    ];
    

    // Khai báo mối quan hệ với model User
    public function user()
    {
        return $this->belongsTo(User::class, 'account_id', 'id');
    }

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id', 'account_id');
    }
}

