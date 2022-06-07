<?php

namespace App\Models;

use App\Models\sumbangan;
use App\Models\daftar_penyumbang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class penyumbang extends Model
{
    protected $table = 'penyumbang';
    protected $guarded = ['id_penyumbang'];
    protected $primaryKey = 'id_penyumbang';
    protected $with = ['daftar_penyumbang'];
    protected $appends = ['total_nominal'];
    public function daftar_penyumbang()
    {
        return $this->hasMany(daftar_penyumbang::class,'id_penyumbang');
    }

    public function sumbangan()
    {
        return $this->belongsTo(sumbangan::class,'kode_kegiatan');
    }

    protected function totalNominal() : Attribute
    {
        return new Attribute(
            get : fn() => $this->daftar_penyumbang()->sum('nominal'),
        );
    }
}
