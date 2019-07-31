<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Booking;

class Transaksi extends Model
{
    protected $fillable = ['id_booking','total_harga'];
    protected $primaryKey = 'id_transaksi';

    public function booking(){
        return $this->hasOne(Booking::class,'id_booking','id_booking');
    }
}
