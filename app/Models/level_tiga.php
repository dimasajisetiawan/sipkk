<?php

namespace App\Models;

use App\Models\level_dua;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class level_tiga extends Model
{
    protected $table = 'level_tiga';
    protected $guarded = ['id_level_tiga'];

    protected $primaryKey = 'id_level_tiga';

    public function level_dua()
    {
        return $this->belongsTo(level_dua::class,'id_level_dua');
    }
    public function transaksi()
    {
        return $this->hasMany(transaksi::class,'id_level_tiga');
    }
}
