<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class transaksi extends Model
{
    protected $table = 'transaksi';
    protected $guarded = ['id_transaksi'];
    protected $primaryKey = 'id_transaksi';
    protected $with = ['sumbangan','level_satu','level_dua','level_tiga'];

    public function sumbangan()
    {
        return $this->belongsTo(sumbangan::class,'kode_kegiatan');
    }
    public function level_satu()
    {
        return $this->belongsTo(level_satu::class,'id_level_satu');
    }
    public function level_dua()
    {
        return $this->belongsTo(level_dua::class,'id_level_dua');
    }
    public function level_tiga()
    {
        return $this->belongsTo(level_tiga::class,'id_level_tiga');
    }
}
