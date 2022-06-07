<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class daftar_penyumbang extends Model
{
    protected $table = 'daftar_penyumbang';
    protected $guarded = ['id_daftar_penyumbang'];
    protected $primaryKey = 'id_daftar_penyumbang';
    protected $with = ['user'];
    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }
}
