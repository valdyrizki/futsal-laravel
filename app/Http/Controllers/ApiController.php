<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use DB;
use App\Lapang;

class ApiController extends Controller
{

    public function indexapi(){
        $lapang = Lapang::select('nama_lapang','harga_lapang','jenis_lapang','gambar_lapang')
        ->where('status_lapang', 'Aktif')
        ->get();
        return $lapang;
    }

    public function loginapi(User $users,Request $request)
    {
        $users = User::where('email', $request->email)
                    ->where('password',$request->password)
                    ->get();

        if (count($users) > 0) {
            foreach ($users as $u) {
                $result ["hasil"] = "1";
                $result ["name"] = $u->name;
                $result ["email"] = $u->email;
                $result ['id'] = $u->id;
                $result ['nohp'] = $u->nohp;
                $result ['password'] = $u->password;
            }

        }else {
            $result ['hasil']= '0';
            }

            echo json_encode($result);
            // User::create($users);
            // return Redirect::to('login')->with(['keterangan' => 'Anda berhasil registrasi','tipe' => 'success']);
    }

    public function registerapi(Request $request){

        $cekuser = User::where('email',$request->email)
        ->orWhere('name',$request->nama)
        ->count();

        if ($cekuser>0) {
            $result ["hasil"] = "0";
            $result ["keterangan"] = "Email atau Nama sudah digunakan";
        }else{

            $register = User::insert([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => $request->password,
                'level' => 'Member',
                'nohp' => $request->nohp,
                'created_at' => date('Y/m/d H:i:s'),
                'updated_at' => date('Y/m/d H:i:s')
            ]);

            if ($register) {

                $user = User::select('id','name','email','nohp')
                ->where('email',$request->email)
                ->get();

                foreach ($user as $u) {
                    $result ["hasil"] = "1";
                    $result ["name"] = $u->name;
                    $result ["email"] = $u->email;
                    $result ['id'] = $u->id;
                    $result ['nohp'] = $u->nohp;
                }

            }else{
                $result ["hasil"] = "1";
                $result ["keterangan"] = "Gagal simpan data";
            }

        }

            echo json_encode($result);
    }

    public function historybooking(Request $request){
        $id = $request->id;
        $booking = DB::table('bookings')
        ->join('lapangs', 'bookings.id_lapang', '=', 'lapangs.id_lapang')
        ->select('bookings.*', 'lapangs.nama_lapang', 'lapangs.harga_lapang', 'lapangs.jenis_lapang','lapangs.gambar_lapang')
        // ->where('tbbooking.id', $id)
        ->get();

            // foreach ($login as $l) {
            //     if (Hash::check($pass, $l->password)) {
            //         $result ["hasil"] = "1";
            //         $result ["name"] = $l->name;
            //         $result ["email"] = $l->email;
            //         $result ['id'] = $l->id;
            //         $result ['nohp'] = $l->nohp;
            //         $result ['password'] = $l->password;
            //         }else {
            //         $result ['hasil']= '0';
            //         }

            // }

            echo json_encode($booking);
    }

    public function listlapang(){
        $lapang = Lapang::select('id_lapang','nama_lapang')
        ->where('status_lapang', '1')
        ->get();
        return $lapang;
    }

    public function addbookingapi(Request $request){

            // Inisialisasi variable
        $id = $request->id;
        $nama = $request->name;
        $nohp = $request->nohp;
        $namalapang = $request->nama_lapang;
        $tgl = $request->tgl_booking;
        $waktu = $request->waktu_booking;
        $status = "Pending";

        //ambil id lapang
        $datalapang = DB::table('lapangs')
        ->select('id_lapang','nama_lapang')
        ->where('nama_lapang',$namalapang)
        ->get();

        if (count($datalapang)>0) {
            foreach ($datalapang as $dl) {
                $idlapang = $dl->id_lapang;
            }
        }else{
            $result ["hasil"] = "0";
        }

        //cek data booking apakah sudah ada
        $databooking = DB::table('bookings')
        ->where('tgl_booking',$tgl)
        ->where('waktu_booking',$waktu)
        ->where('id_lapang',$idlapang)
        ->where('status_booking','Pending','Konfirmasi')
        ->get();
        if (count($databooking) > 0) {
            $result ["hasil"] = "2";
        }else{
           // insert data ke table booking
        DB::table('bookings')->insert([
            'id' => $id,
            'name' => $nama,
            'nohp' => $nohp,
            'id_lapang' => $idlapang,
            'tgl_booking' => $tgl,
            'waktu_booking' => $waktu,
            'status_booking' => $status
        ]);
        $result ["hasil"] = "1";
        }


        return $result;

    }




}
