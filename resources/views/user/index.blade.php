@extends('layouts.app')

@section('title','Data User')

@section('content')
<!-- Checkbox start -->


			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-block">
                                <ul class="nav nav-tabs md-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#daftaruser" role="tab">Daftar User</a>
                                        <div class="slide"></div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tambahuser" role="tab">Tambah User</a>
                                        <div class="slide"></div>
                                    </li>
                                </ul>



                                <div class="clearfix">&nbsp;</div>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="daftaruser" role="tabpanel">
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
                                                                    <th class="text-center txt-primary">Email</th>
                                                                    <th class="text-center txt-primary">No HP</th>
                                                                    <th class="text-center txt-primary">Level</th>
                                                                    <th class="text-center txt-primary">Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody class="text-center">
                                                                @php
                                                                    $no = 0;
                                                                @endphp
                                                                @foreach ($users as $u)
                                                                @php
                                                                    $no++;
                                                                @endphp
                                                                <tr>
                                                                    <td>
                                                                        {{$no}}
                                                                    </td>
                                                                    <td>{{$u->name}}</td>
                                                                    <td>{{$u->email}}</td>
                                                                    <td>{{$u->nohp}}</td>
                                                                    <td class="text-center"><span class="label label-success m-t-20">{{Fungsi::getLevel($u->level)}}</span>
                                                                    </td>
                                                                    <td class="faq-table-btn">
                                                                    <form action="/user/{{$u->id}}/edit" method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button type="submit" class="btn btn-primary waves-effect waves-light icofont icofont-ui-edit" data-toggle="tooltip" data-placement="top" title="Edit">

                                                                        </button>
                                                                    </form>

                                                                    <form action="/user/{{$u->id}}/hapus" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')

                                                                        <button type="submit" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                            <i class="icofont icofont-ui-delete"></i>
                                                                        </button>
                                                                    </form>
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

                                    <div class="tab-pane" id="tambahuser" role="tabpanel">
                                        <div class="container">
                                            <form method="POST" action="/tambahuser">
                                                @csrf
                                                @include('user.partials.form',[
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
