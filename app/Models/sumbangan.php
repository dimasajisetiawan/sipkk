<?php

namespace App\Models;

use App\Models\penyumbang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class sumbangan extends Model
{
    protected $table = 'sumbangan';
    protected $guarded = [];
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'kode_kegiatan';
    protected $with = ['penyumbang'];

    public function penyumbang()
    {
        return $this->hasOne(penyumbang::class,'kode_kegiatan');
    }

    public function transaksi()
    {
        return $this->hasOne(transaksi::class,'kode_kegiatan');
    }

}
