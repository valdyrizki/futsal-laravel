@extends('layouts.app')

@section('title','Data Transaksi')

@section('content')
<!-- Checkbox start -->


			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-block">
                                <ul class="nav nav-tabs md-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#transaksiselesai" role="tab">Transaksi Selesai</a>
                                        <div class="slide"></div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#cetaklaporan" role="tab">Cetak Laporan</a>
                                        <div class="slide"></div>
                                    </li>
                                </ul>



                                <div class="clearfix">&nbsp;</div>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="transaksiselesai" role="tabpanel">
                                            <!-- end of card-header  -->
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="project-table">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <th class="text-center txt-primary pro-pic">No</th>
                                                                    <th class="text-center txt-primary">Nama</th>
                                                                    <th class="text-center txt-primary">No HP</th>
                                                                    <th class="text-center txt-primary">Lapang</th>
                                                                    <th class="text-center txt-primary">Total Harga</th>
                                                                    <th class="text-center txt-primary">Status</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody class="text-center">
                                                                @php
                                                                    $no = 0;
                                                                @endphp
                                                                @foreach ($transaksi as $t)
                                                                @php
                                                                    $no++;
                                                                @endphp
                                                                <tr>
                                                                    <td>
                                                                        {{$no}}
                                                                    </td>
                                                                    <td>{{$t->booking->name}}</td>
                                                                    <td>{{$t->booking->nohp}}</td>
                                                                    <td>{{$t->booking->lapang->nama_lapang}} - {{Fungsi::getJenislapang($t->booking->lapang->jenis_lapang)}}</td>
                                                                    <td>{{$t->total_harga}}</td>
                                                                    </td>
                                                                    <td class="text-center">
                                                                    @if ($t->booking->status_booking == 3)
                                                                    <span class="label label-success m-t-20">
                                                                    @else
                                                                    <span class="label label-danger m-t-20">
                                                                    @endif
                                                                    {{Fungsi::getStatusbooking($t->booking->status_booking)}}</span>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                            <!-- end of table -->
                                                        </div>
                                                        <!-- end of table responsive -->
                                                    </div>
                                                    <!-- end of project table -->
                                                </div>
                                                <!-- end of col-lg-12 -->
                                            </div>
                                            <!-- end of row -->
                                        </div>

                                    <div class="tab-pane" id="cetaklaporan" role="tabpanel">
                                        <div class="container">
                                            <form method="POST" action="/printlaporan">
                                                @csrf
                                                @include('laporan.partials.form',[
                                                    'submit_button' => 'Print Laporan'
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
