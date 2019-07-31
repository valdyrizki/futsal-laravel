<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

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



}
