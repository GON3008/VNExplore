<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        'status',
        'deleted',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($voucher) {
            $voucher->voucher_code = strtoupper(Str::random(10));
        });
    }

    public function useVoucher()
    {
        if ($this->quantity > 0) {
            $this->quantity -= 1;
            $this->save();
        } else {
            throw new \Exception('No voucher left');
        }
    }
}
