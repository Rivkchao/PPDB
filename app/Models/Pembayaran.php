<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';

    protected $fillable = [
        'nisn',
        'order_id',
        'status',
        'gross_amount',
        'payment_type',
        'transaction_time',
        'midtrans_response'
    ];

    public $timestamps = true;
}