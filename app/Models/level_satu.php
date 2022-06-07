<?php

namespace App\Models;

use App\Models\level_dua;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class level_satu extends Model
{
    protected $table = 'level_satu';
    protected $guarded = ['id_level_satu'];
    protected $primaryKey = 'id_level_satu';
    protected $with = ['level_dua'];

    public function level_dua()
    {
        return $this->hasMany(level_dua::class,'id_level_satu');
    }
    public function transaksi()
    {
        return $this->hasMany(transaksi::class,'id_level_satu');
    }

}
