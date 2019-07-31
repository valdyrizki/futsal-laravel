<?php

namespace App\Http\Controllers;
use App\Lapang;
use Session;

use Illuminate\Http\Request;
use App\Testimoni;

class HomeController extends Controller
{
    public function index()
    {
        $lapang = new Lapang;
        $lapangs = Lapang::where('status_lapang','1')->get();
        return view('home',compact('lapangs','lapang'));
    }

    public function logout()
    {
        Session::flush();
        return redirect('/login')->with(['keterangan' => 'Anda telah berhasil logout']);
    }
}
