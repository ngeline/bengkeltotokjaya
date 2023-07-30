<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnedCars extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name_stnk', 'number_plat', 'nama_mobil', 'jenis_mobil'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
