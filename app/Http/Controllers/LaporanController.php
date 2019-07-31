<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;

class LaporanController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::all();
        return view('laporan.index',compact('transaksi'));
    }

    public function printlaporan(Request $request)
    {
        $transaksi = Transaksi::whereBetween('created_at', [$request->tgl1,$request->tgl2])->get();
        return view('laporan.printlaporan',compact('transaksi'));
    }
}
