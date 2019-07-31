<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['id','name','nohp','id_lapang','tgl_booking','waktu_booking','status_booking'];
    protected $primaryKey = 'id_booking';

    public function Lapang(){
        return $this->belongsTo(Lapang::class,'id_lapang','id_lapang');
    }

}
