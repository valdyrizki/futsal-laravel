<?php

namespace App\Http\Controllers;

use App\Lapang;

use Carbon\Carbon;
use Image;
use File;

use Illuminate\Http\Request;
use App\Http\Requests\LapangRequest;
use App\Transaksi;
use App\Testimoni;

class LapangController extends Controller
{

    function __construct()
    {
        $this->path = storage_path('app/public/lapang');

        $this->dimensions = ['245','300','500'];
        $this->folder = 'lapang';
    }

    public function index()
    {
        $lapang = new Lapang;
        $lapangs = Lapang::all();
        return view('lapang.index',compact('lapangs','lapang'));
    }

    public function create(LapangRequest $request)
    {

        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        if (!File::isDirectory($this->path)){
            //Buat Folder
            File::makeDirectory($this->path);
        }

        //Mengambil Image dari form
        $file = $request->file('image');

        //Membuat nama file dari gabungan timestamp dan uniqid
        $fileName = Carbon::now()->timestamp.'_'.uniqid().'.'.$file->getClientOriginalExtension();

        //Upload original file (sebelum di ubah dimensinya)
        Image::make($file)->save($this->path.'/'.$fileName);

        foreach ($this->dimensions as $row){
            //membuat canvas image sesuai sebesar dimensi yang ada di dalam array
            $canvas = Image::canvas($row, $row);
            //resize /mengubah ukuran gambar sesuai dimaensi yang ada pada array
            $resizeImage=Image::make($file)->resize($row,$row,function($constraint){
                //MEMPERTAHANKAN RASIO
                $constraint->aspectRatio();
            });
            //Jika folder blm ada
            if (!File::isDirectory($this->path.'/'.$row)) {
                # code...
                // buat folder
                File::makeDirectory($this->path.'/'.$row);
            }
            //memasukan image yang telah di resize kedalam canvas
            $canvas->insert($resizeImage,'center');
            //simpan image ke folder
            $canvas->save($this->path.'/'.$row.'/'.$fileName);
        }

        //$lapang = request()->all();
        //Lapang::create($lapang);

        Lapang::create([
            'nama_lapang' => $request->nama_lapang,
            'jenis_lapang' => $request->jenis_lapang,
            'harga_lapang' => $request->harga_lapang,
            'gambar_lapang' => $fileName,
            'folder_lapang' => $this->folder,
            'status_lapang' => $request->status_lapang
        ]);
        return back()->with(['keterangan' => 'Lapang berhasil disimpan','tipe' => 'success']);
    }


    public function edit($lapang)
    {
        // $lapang = Lapang::where('id_lapang',$id)->first();
        $lapang = Lapang::find($lapang);
        return view('lapang.edit',compact('lapang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Lapang $lapang, Request $request)
    {
        if ($request->image) {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpg,png,jpeg'
            ]);

            if (!File::isDirectory($this->path)){
                //Buat Folder
                File::makeDirectory($this->path);
            }

            //Mengambil Image dari form
            $file = $request->file('image');

            //Membuat nama file dari gabungan timestamp dan uniqid
            $fileName = Carbon::now()->timestamp.'_'.uniqid().'.'.$file->getClientOriginalExtension();

            //Upload original file (sebelum di ubah dimensinya)
            Image::make($file)->save($this->path.'/'.$fileName);

            foreach ($this->dimensions as $row){
                //membuat canvas image sesuai sebesar dimensi yang ada di dalam array
                $canvas = Image::canvas($row, $row);
                //resize /mengubah ukuran gambar sesuai dimaensi yang ada pada array
                $resizeImage=Image::make($file)->resize($row,$row,function($constraint){
                    //MEMPERTAHANKAN RASIO
                    $constraint->aspectRatio();
                });
                //Jika folder blm ada
                if (!File::isDirectory($this->path.'/'.$row)) {
                    # code...
                    // buat folder
                    File::makeDirectory($this->path.'/'.$row);
                }
                //memasukan image yang telah di resize kedalam canvas
                $canvas->insert($resizeImage,'center');
                //simpan image ke folder
                $canvas->save($this->path.'/'.$row.'/'.$fileName);
            }

            $lapang->update([
                'nama_lapang' => $request->nama_lapang,
                'jenis_lapang' => $request->jenis_lapang,
                'harga_lapang' => $request->harga_lapang,
                'gambar_lapang' => $fileName,
                'folder_lapang' => $this->folder,
                'status_lapang' => $request->status_lapang
                ]);
        }else{
            $lapang->update([
                'nama_lapang' => $request->nama_lapang,
                'jenis_lapang' => $request->jenis_lapang,
                'harga_lapang' => $request->harga_lapang,
                'status_lapang' => $request->status_lapang
                ]);
        }
        return redirect('/lapang')->with(['keterangan' => 'Lapang berhasil diedit', 'tipe' => 'success']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Lapang $lapang)
    {
        $lapang->delete();
        return redirect('/lapang')->with(['keterangan' => 'Lapang berhasil dihapus', 'tipe' => 'success']);
    }

    public function detail($lapang)
    {
        $testimoni = Testimoni::where('id_lapang',$lapang)->get();
        $lapangs = Lapang::find($lapang);
        return view('detaillapang',compact('lapangs','testimoni'));
    }
}
