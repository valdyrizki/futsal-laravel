<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lapang extends Model
{
    protected $fillable = ['nama_lapang','jenis_lapang','harga_lapang','gambar_lapang','folder_lapang','status_lapang'];
    protected $primaryKey = 'id_lapang';

    // public function Booking(){
    //     return $this->hasMany(Booking::class,'id_lapang','id_lapang');
    // }
}
