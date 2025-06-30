<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_type',
        'service_id',
        'payment_method',
        'transaction_id',
        'amount',
        'fee',
        'refund_amount',
        'currency',
        'status',
        'payment_gateway_response',
        'paid_at',
    ];

    protected $casts = [
        'payment_gateway_response' => 'array',
        'paid_at' => 'datetime'
    ];
}
