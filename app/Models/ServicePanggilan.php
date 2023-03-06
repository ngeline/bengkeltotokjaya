<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePanggilan extends Model
{
    protected $fillable = [
    'user_id',
    'status',
    'name_stnk'
    ,'no_antrian' 
    ,'tanggal' 
    ,'number_plat' 
    ,'nama_mobil'
    ,'jenis_mobil'
    ,'service_date'
    ,'pembayaran'
    ,'keterangan'
    ,'photo'
    ,'maps'
    ,'complaint',];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function jenisService()
    {
        return $this->belongsTo(Jenis_Service::class, 'jenisService_id', 'id');
    }

    public function detail_services()
    {
        return $this->hasMany(DetailService::class, 'service_id', 'id');
    }

    public function detail_jenisServices()
    {
        return $this->hasMany(DetailJenisService::class, 'service_id', 'id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'service_id', 'id');
    }
}
