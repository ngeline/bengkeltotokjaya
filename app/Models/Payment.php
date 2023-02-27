<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table="payments";
    protected $fillable = [
        'id',
        'service_id',
        'namaRek',
        'bank',
        'pembayaran',
        'buktiPayment',
        'total',
        'order_date',

    ];
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
}
