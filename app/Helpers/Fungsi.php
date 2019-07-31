<?php
namespace App\Helpers;

class Fungsi {
    public static function getRupiah($value) {
        $format = "Rp " . number_format($value,2,',','.');
        return $format;
    }

    public static function getJenislapang($value) {
        if ($value == 1) {
            $format = 'Sintetis';
        }elseif($value == 2){
            $format = 'V-Sport';
        }else{
            $format = 'Error';
        }
        return $format;
    }

    public static function getLevel($value) {
        if ($value == 1) {
            $format = 'Member';
        }elseif($value == 2){
            $format = 'Admin';
        }elseif($value == 3){
            $format = 'Pemilik';
        }else{
            $format = 'Error';
        }
        return $format;
    }

    public static function getStatusbooking($value) {
        switch ($value) {
            case '1':
            return 'Pending';
                break;

            case '2':
            return 'Konfirmasi';
                break;

            case '3':
            return 'Selesai';
                break;

            case '4':
            return 'Cancel';
                break;

            default:
                return 'Error';
                break;
        }

    }

    public static function getRating($value) {

        // $rating = \App\Testimoni::avg('rating')->where('id_lapang',$value);
        $rating = \App\Testimoni::select('rating')->where('id_lapang',$value)->get();
        $rate = $rating->avg('rating');

        if ($rate) {
            return $rate;
        }else{
            return 0;
        }

    }

}
