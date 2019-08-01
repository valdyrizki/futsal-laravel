<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Transaksi;
use Session;


use Illuminate\Http\Request;
use App\Testimoni;

class BookingController extends Controller
{
    //ADMIN
    //KOMEN
    public function index()
    {
        $booking = new Booking;
        $bookings = Booking::where('status_booking', '2')->get();
        $bookings2 = Booking::where('status_booking', '1')->get();
        // $lapangs = Lapang::all();
        return view('booking.index',compact('bookings','bookings2','booking'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:30',
            'nohp' => 'required|min:6|max:15',
            'id_lapang' => 'required',
            'tgl_booking' => 'required|after:yesterday',
            'waktu_booking' => 'required|after:now'
        ]);

        $cek = Booking::where('id_lapang',$request->id_lapang)
                ->where('tgl_booking',$request->tgl_booking)
                ->where('waktu_booking',$request->waktu_booking)
                ->count();

                if ($cek > 0) {
                    return back()->with(['keterangan' => 'Lapang sudah ada yang booking','tipe' => 'danger']);
                }else{
                    Booking::create([
                        'name' => $request->name,
                        'id' => Session::get('id'),
                        'nohp' => $request->nohp,
                        'id_lapang' => $request->id_lapang,
                        'tgl_booking' => $request->tgl_booking,
                        'status_booking' => '2',
                        'waktu_booking' => $request->waktu_booking
                    ]);
                    return back()->with(['keterangan' => 'Booking berhasil','tipe' => 'success']);
                }
    }

    public function konfirmasi(Booking $booking)
    {
        $booking->update([
            'status_booking' => 2
            ]);
            return back()->with(['keterangan' => 'Sudah dikonfirmasi','tipe' => 'success']);
    }

    public function cancel(Booking $booking)
    {

        $booking->update([
            'status_booking' => 4
            ]);

            Transaksi::create([
                'id_booking' => $booking->id_booking,
                'total_harga' => 0
            ]);

            return back()->with(['keterangan' => 'Cancel berhasil','tipe' => 'success']);
    }

    public function selesai(Booking $booking)
    {
        $booking->update([
            'status_booking' => 3
            ]);

            Transaksi::create([
                'id_booking' => $booking->id_booking,
                'total_harga' => $booking->lapang->harga_lapang
            ]);

            Booking::all();

            return view('bookingm.buktitransaksi',compact('booking'));

            // return back()->with(['keterangan' => 'Sudah dibayar','tipe' => 'success']);
    }

    //MEMBER

    public function indexm()
    {
        $booking = new Booking;
        $bookings = Booking::where('id',Session::get('id'))->get();
        // $lapangs = Lapang::all();
        return view('bookingm.index',compact('bookings','booking'));
    }

    public function cancelm(Booking $booking)
   {

       $booking->update([
           'status_booking' => 4
           ]);

           Transaksi::create([
            'id_booking' => $booking->id_booking,
            'total_harga' => 0
        ]);
           return back()->with(['keterangan' => 'Cancel berhasil','tipe' => 'success']);
   }

   public function storem(Request $request)
   {
       $this->validate($request, [
           'id_lapang' => 'required',
           'tgl_booking' => 'required',
           'waktu_booking' => 'required'
       ]);

       $cek = Booking::where('id_lapang',$request->id_lapang)
       ->where('tgl_booking',$request->tgl_booking)
       ->where('waktu_booking',$request->waktu_booking)
       ->count();

       if ($cek > 0) {
           return back()->with(['keterangan' => 'Lapang sudah ada yang booking','tipe' => 'danger']);
       }else{

        Booking::create([
            'name' => Session::get('name'),
            'id' => Session::get('id'),
            'nohp' => Session::get('nohp'),
            'id_lapang' => $request->id_lapang,
            'tgl_booking' => $request->tgl_booking,
            'status_booking' => '1',
            'waktu_booking' => $request->waktu_booking
        ]);
        return back()->with(['keterangan' => 'Booking berhasil','tipe' => 'success']);
       }
   }

   public function testimoni($booking)
   {
       $booking = Booking::find($booking);
       return view('bookingm.testimoni',compact('booking'));
   }

   public function addtestimoni(Request $request,$id)
   {
       $this->validate($request, [
           'testimoni' => 'required',
           'rating' => 'required'
       ]);

       $cek = Testimoni::where('id_lapang',$request->id_lapang)
       ->where('id_booking',$request->id_booking)
       ->count();

       if ($cek > 0) {
        return redirect('/bookingm')->with(['keterangan' => 'Anda sudah memberi testimoni sebelumnya','tipe' => 'danger']);
       }else{
        Testimoni::create([
            'rating' => $request->rating,
            'id' => Session::get('id'),
            'testimoni' => $request->testimoni,
            'id_lapang' => $request->id_lapang,
            'id_booking' => $request->id_booking
        ]);

        return redirect('/bookingm')->with(['keterangan' => 'Rating berhasil','tipe' => 'success']);
       }

   }

   public function print(Booking $booking)
   {
       Booking::all();
       return view('bookingm.buktitransaksi',compact('booking'));
   }
}
