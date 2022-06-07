<?php

namespace App\Models;

use App\Models\level_satu;
use App\Models\level_tiga;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class level_dua extends Model
{
    protected $table = 'level_dua';
    protected $guarded = ['id_level_dua'];
    protected $primaryKey = 'id_level_dua';
    protected $with = ['level_tiga'];

    public function level_satu()
    {
        return $this->belongsTo(level_satu::class,'id_level_satu');
    }

    public function level_tiga()
    {
        return $this->hasMany(level_tiga::class,'id_level_dua');
    }
    public function transaksi()
    {
        return $this->hasMany(transaksi::class,'id_level_dua');
    }
}
