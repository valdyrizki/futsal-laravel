@extends('layouts.app')

@section('title','Dashboard')

@section('content')
<!-- Checkbox start -->


			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-block">
                                <ul class="nav nav-tabs md-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#daftarlapang" role="tab">Daftar Lapang</a>
                                        <div class="slide"></div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tambahlapang" role="tab">Tambah Lapang</a>
                                        <div class="slide"></div>
                                    </li>
                                </ul>



                                <div class="clearfix">&nbsp;</div>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="daftarlapang" role="tabpanel">
                                        @foreach ($lapangs as $l)
                                        <div class="col-xl-4 col-lg-12">
                                            <div class="card">
                                                <div class="user-block-2">
                                                        <h4>{{$l->nama_lapang}}</h4>
                                                    <img class="img-fluid" src="{{asset('storage/'.$l->folder_lapang.'/245/'.$l->gambar_lapang)}}" alt="user-header">

                                                </div>

                                                <div class="card-block">
                                                    <div class="user-block-2-activities">
                                                        <div class="user-block-2-active">
                                                            <i class="icofont icofont-ball"></i> Jenis Lapang
                                                            <label class="label label-primary">@include('layouts.partials.jenislapang')</label>
                                                        </div>
                                                    </div>
                                                    <div class="user-block-2-activities">
                                                        <div class="user-block-2-active">
                                                            <i class="icofont icofont-price"></i> Harga
                                                            <label class="label label-primary">{{Fungsi::getRupiah($l->harga_lapang)}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="user-block-2-activities">
                                                        <div class="user-block-2-active">
                                                            <i class="icofont icofont-star"></i> Rating
                                                        <label class="label label-primary">
                                                        @if ($l->rating_lapang)
                                                        {{$l->rating_lapang}}
                                                        @else
                                                            0
                                                        @endif</label>
                                                        </div>
                                                    </div>

                                                    <div class="user-block-2-activities">
                                                        <div class="user-block-2-active">
                                                            <i class="icofont icofont-ui-user"></i> Status
                                                            <label class="label label-primary">@include('layouts.partials.statuslapang')</label>
                                                        </div>

                                                    </div>
                                                    <div class="text-center">
                                                        <form action="/lapang/{{$l->id_lapang}}/hapus" method="POST">
                                                            @csrf
                                                            @method("DELETE")
                                                            <input type="submit" value="Hapus" class="btn btn-danger waves-effect waves-light text-uppercase m-r-30">
                                                            <a href="/lapang/{{$l->id_lapang}}/edit">
                                                                <button type="button" class="btn btn-primary waves-effect waves-light text-uppercase">
                                                                    Edit
                                                                </button>
                                                            </a>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                    <div class="tab-pane" id="tambahlapang" role="tabpanel">
                                        <div class="container">
                                            <form method="POST" action="/tambahlapang" enctype="multipart/form-data">
                                                @csrf
                                                @include('lapang.partials.form',[
                                                    'submit_button' => 'Simpan'
                                                ])
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
