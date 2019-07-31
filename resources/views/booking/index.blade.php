@extends('layouts.app')

@section('title','Menu Booking')

@section('content')

			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-block">
                                <ul class="nav nav-tabs md-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#daftarbooking" role="tab">Daftar Booking</a>
                                        <div class="slide"></div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#pendingbooking" role="tab">Pending Booking</a>
                                        <div class="slide"></div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tambahbooking" role="tab">Tambah Booking</a>
                                        <div class="slide"></div>
                                    </li>
                                </ul>



                                <div class="clearfix">&nbsp;</div>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="daftarbooking" role="tabpanel">
                                            <section class="panels-wells">

                                                    <div class="card">
                                                     <div class="card-header"><h5 class="card-header-text">Daftar Booking</h5></div>
                                                      <div class="card-block">
                                                        <div class="row">
                                                            @foreach ($bookings as $b)
                                                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 p-3" >
                                                                    @switch($b->status_booking)
                                                                        @case(1)
                                                                            <div class="panel panel-info">
                                                                                <div class="panel-heading bg-info">
                                                                                  {{$b->tgl_booking ." - ".Fungsi::getStatusbooking($b->status_booking)}}
                                                                                </div>
                                                                                <div class="panel-body">
                                                                                    <p><b>Atas Nama : </b>{{$b->name}}</p>
                                                                                    <p><b>Waktu Booking : </b> {{$b->waktu_booking}} WIB</p>
                                                                                    <p><b>Lapang : </b>{{$b->lapang->nama_lapang." - ".Fungsi::getJenislapang($b->lapang->jenis_lapang)}}</p>
                                                                                    <p><b>Harga : </b>{{Fungsi::getRupiah($b->lapang->harga_lapang)}}</p>
                                                                                </div>
                                                                                <div class="panel-footer">
                                                                                    <a href="/booking/{{$b->id_booking}}/print"><button class="btn btn-primary">Print</button></a>
                                                                                    <form action="/booking/{{$b->id_booking}}/cancel" method="POST">
                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <input type="submit" class="btn btn-danger" value="Cancel">
                                                                                    </form>

                                                                                </div>
                                                                            </div>
                                                                            @break
                                                                        @case(2)
                                                                        <div class="panel panel-primary">
                                                                            <div class="panel-heading bg-primary">
                                                                                    {{$b->tgl_booking ." - ".Fungsi::getStatusbooking($b->status_booking)}}
                                                                            </div>
                                                                            <div class="panel-body">
                                                                                <p><b>Atas Nama : </b>{{$b->name}}</p>
                                                                                <p><b>Waktu Booking : </b> {{$b->waktu_booking}} WIB</p>
                                                                                <p><b>Lapang : </b>{{$b->lapang->nama_lapang." - ".Fungsi::getJenislapang($b->lapang->jenis_lapang)}}</p>
                                                                                <p><b>Harga : </b>{{Fungsi::getRupiah($b->lapang->harga_lapang)}}</p>
                                                                            </div>
                                                                            <div class="panel-footer txt-primary">
                                                                                <a href="/booking/{{$b->id_booking}}/print"><button class="btn btn-primary">Print</button></a>
                                                                            <form action="/booking/{{$b->id_booking}}/selesai" method="POST">
                                                                                @csrf
                                                                                @method('put')
                                                                                <input type="submit" class="btn btn-success" value="Selesai Main">
                                                                            </form>
                                                                            <form action="/booking/{{$b->id_booking}}/cancel" method="POST">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <input type="submit" class="btn btn-danger" value="Cancel">
                                                                            </form>
                                                                            </div>
                                                                        </div>
                                                                            @break
                                                                        @case(3)

                                                                        <div class="panel panel-success">
                                                                            <div class="panel-heading bg-success">
                                                                                    {{$b->tgl_booking ." - ".Fungsi::getStatusbooking($b->status_booking)}}
                                                                            </div>
                                                                            <div class="panel-body">
                                                                            <p><b>Atas Nama : </b>{{$b->name}}</p>
                                                                            <p><b>Waktu Booking : </b> {{$b->waktu_booking}} WIB</p>
                                                                            <p><b>Lapang : </b>{{$b->lapang->nama_lapang." - ".Fungsi::getJenislapang($b->lapang->jenis_lapang)}}</p>
                                                                            <p><b>Harga : </b>{{Fungsi::getRupiah($b->lapang->harga_lapang)}}</p>
                                                                            </div>
                                                                            <div class="panel-footer txt-success">
                                                                                <a href="/booking/{{$b->id_booking}}/print"><button class="btn btn-primary">Print</button></a>
                                                                                <a href="/rating"><button class="btn btn-warning">Rating</button></a>
                                                                            </div>
                                                                        </div>
                                                                            @break

                                                                        @case(4)
                                                                            <div class="panel panel-danger">
                                                                                <div class="panel-heading bg-danger">
                                                                                        {{$b->tgl_booking ." - ".Fungsi::getStatusbooking($b->status_booking)}}
                                                                                </div>
                                                                                <div class="panel-body">
                                                                                    <p><b>Atas Nama : </b>{{$b->name}}</p>
                                                                                    <p><b>Waktu Booking : </b> {{$b->waktu_booking}} WIB</p>
                                                                                    <p><b>Lapang : </b>{{$b->lapang->nama_lapang." - ".Fungsi::getJenislapang($b->lapang->jenis_lapang)}}</p>
                                                                                    <p><b>Harga : </b>{{Fungsi::getRupiah($b->lapang->harga_lapang)}}</p>


                                                                                <div class="panel-footer txt-danger">

                                                                                    <a href="/booking/{{$b->id_booking}}/print"><button class="btn btn-primary">Print</button></a>
                                                                                </div>
                                                                            </div>
                                                                            @break

                                                                        @default

                                                                    @endswitch

                                                                </div>
                                                            @endforeach

                                                        <!-- end of row -->
                                                      </div>
                                                    </div>
                                                  </div>
                                              </section>
                                    </div>

                                    <div class="tab-pane" id="pendingbooking" role="tabpanel">
                                        <section class="panels-wells">

                                                <div class="card">
                                                 <div class="card-header"><h5 class="card-header-text">Pending Booking</h5></div>
                                                  <div class="card-block">
                                                    <div class="row">
                                                        @foreach ($bookings2 as $b2)
                                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 p-3" >
                                                                        <div class="panel panel-info">
                                                                            <div class="panel-heading bg-info">
                                                                              {{$b2->tgl_booking ." - ".Fungsi::getStatusbooking($b2->status_booking)}}
                                                                            </div>
                                                                            <div class="panel-body">
                                                                                <p><b>Atas Nama : </b>{{$b2->name}}</p>
                                                                                <p><b>Waktu Booking : </b> {{$b2->waktu_booking}} WIB</p>
                                                                                <p><b>Lapang : </b>{{$b2->lapang->nama_lapang." - ".Fungsi::getJenislapang($b2->lapang->jenis_lapang)}}</p>
                                                                                <p><b>Harga : </b>{{Fungsi::getRupiah($b2->lapang->harga_lapang)}}</p>
                                                                            </div>
                                                                            <div class="panel-footer">

                                                                                <form action="/booking/{{$b2->id_booking}}/konfirmasi" method="POST">
                                                                                    @csrf
                                                                                    @method('PUT')
                                                                                    <input type="submit" class="btn btn-primary" value="Konfirmasi">
                                                                                </form>
                                                                                <form action="/booking/{{$b2->id_booking}}/cancel" method="POST">
                                                                                    @csrf
                                                                                    @method('PUT')
                                                                                    <input type="submit" class="btn btn-danger" value="Cancel">
                                                                                </form>

                                                                            </div>
                                                                        </div>
                                                            </div>
                                                        @endforeach
                                                    <!-- end of row -->
                                                  </div>
                                                </div>
                                              </div>
                                          </section>
                                        </div>



                                    <div class="tab-pane" id="tambahbooking" role="tabpanel">
                                        <div class="container">
                                            <form method="POST" action="/tambahbooking">
                                                @csrf
                                                @include('booking.partials.form',['submit_button' => 'Tambah Booking'])
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
					</div>
				</div>
			</div>
            <!-- Row end -->



@endsection
