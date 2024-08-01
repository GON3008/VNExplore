<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'voucher_code',
        'quantity',
        'discount_amount',
        'valid_from',
        'valid_until',
        'active',
        'deleted',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($voucher) {
            $voucher->voucher_code = str::upper(Str::random(10));
        });
    }

    public function userVouchers()
    {
        if ($this->quantity > 0) {
            $this->quantity -=1;
            $this->save();
        }else{
            throw new Exception('No voucher left');
        }
    }
}
