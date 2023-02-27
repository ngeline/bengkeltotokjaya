<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailService extends Model
{
    use HasFactory;
    protected $table="detail_services";
    protected $fillable = [
        'id',
        'service_id',
        'sparepart_id',
        'sparepartName',
        'total_sparepart',
        'price',
        'biayaPemasangan',
        'total_price',
    ];


    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

    public function sparepart()
    {
        return $this->belongsTo(Sparepart::class, 'sparepart_id', 'id');
    }
}
