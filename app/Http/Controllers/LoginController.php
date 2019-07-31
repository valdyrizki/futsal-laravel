<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Input;
use Redirect;
use App\User;
use Session;
use App\Http\Requests\UserRequest;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function indexadmin()
    {
        return view('login.indexadmin');
    }

    public function register()
    {
        return view('login.register');
    }

    public function prosesregister(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|min:3|max:30',
            'email' => 'required|min:3|max:40',
            'nohp' => 'required|min:6|max:15',
            'password' => 'required|min:8'
        ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'nohp' => $request->nohp,
                'level' => 1
            ]);
            return Redirect::to('login')->with(['keterangan' => 'Anda berhasil registrasi','tipe' => 'success']);
    }

    public function proseslogin(User $users,Request $request)
    {
        $users = User::where('email', $request->email)
                    ->where('password',$request->password)
                    ->where('level',1)
                    ->get();

        if (count($users) > 0) {
            foreach ($users as $u) {
                Session::put('id',$u->id);
                Session::put('name',$u->name);
                Session::put('nohp',$u->nohp);
                Session::put('email',$u->email);
                Session::put('level',$u->level);
                Session::put('login',TRUE);
            }
            return Redirect::to('/')->with(['keterangan' => 'Anda sudah login','tipe' => 'success']);
        }else{
            return Redirect::to('login')->withErrors(['keterangan' => 'Anda gagal Login']);
        }
            // User::create($users);
            // return Redirect::to('login')->with(['keterangan' => 'Anda berhasil registrasi','tipe' => 'success']);

    }

    public function prosesloginadmin(User $users,Request $request)
    {
        $users = User::where('email', $request->email)
                    ->where('password',$request->password)
                    ->get();

        if (count($users) > 0) {
            foreach ($users as $u) {
                Session::put('id',$u->id);
                Session::put('name',$u->name);
                Session::put('nohp',$u->nohp);
                Session::put('email',$u->email);
                Session::put('level',$u->level);
                Session::put('login',TRUE);
            }
            return Redirect::to('/')->with(['keterangan' => 'Anda sudah login','tipe' => 'success']);
        }else{
            return Redirect::to('login')->withErrors(['keterangan' => 'Anda gagal Login']);
        }
            // User::create($users);
            // return Redirect::to('login')->with(['keterangan' => 'Anda berhasil registrasi','tipe' => 'success']);

    }

}
