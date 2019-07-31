<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $fillable = ['rating','testimoni','id_booking','id_lapang','id'];
    protected $primaryKey = 'id_testimoni';

    public function lapang()
    {
        return $this->hasMany('App\Lapang', 'id_lapang', 'id_lapang');
    }

    public function user()
    {
        return $this->hasone('App\User', 'id', 'id');
    }
}
