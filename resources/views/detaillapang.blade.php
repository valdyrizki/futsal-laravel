@extends('layouts.app')
@section('title','Detail Lapang')

@section('content')
<div class="col-xl-3 col-lg-4">
    <div class="card">
        <div class="social-profile">
            <img class="img-fluid" src="{{asset('storage/'.$lapangs->folder_lapang.'/245/'.$lapangs->gambar_lapang)}}" alt="">
            <div class="profile-hvr m-t-15">
                <i class="icofont icofont-ui-edit p-r-10 c-pointer"></i>
                <i class="icofont icofont-ui-delete c-pointer"></i>
            </div>
        </div>
        <div class="card-block">
            <h4 class="f-18 f-normal m-b-10 txt-primary text-center">{{$lapangs->nama_lapang}}</h4>
            <h5 class="f-14 text-center">{{Fungsi::getJenislapang($lapangs->jenis_lapang)}}</h5>
            <p class="m-b-15">Harga : {{Fungsi::getRupiah($lapangs->harga_lapang)}} <br>
            Rating : {{Fungsi::getRating($lapangs->id_lapang)}}</p>
            <div class="faq-profile-btn">
                <a href="/bookingm">
                    <button type="button" class="btn btn-primary waves-effect waves-light">Booking
                    </button>
                </a>
            </div>

        </div>

    </div>

</div>

<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            <h5 class="card-header-text">Testimoni</h5>
        </div>
        <div class="card-block">
            <div class="view-info">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="general-info">
                            <div class="row">
                                    <div class="card-block row box-list">
                                            <!-- Start a Box p-20 -->
                                            @foreach ($testimoni as $t)
                                            <div class="col-lg-4">
                                                <div class="p-20 z-depth-right-0 waves-effect" data-toggle="tooltip" data-placement="top" title=".z-depth-right-0">
                                                <h3 class="text-center">{{$t->user->name}}</h3>
                                                    <p class="text-sm-center">{{$t->testimoni}}</p> <br>
                                                    <h2>
                                                        @for ($i = 0; $i < $t->rating; $i++)
                                                        <span class="icofont icofont-star" style="color:yellow">&nbsp;</span>
                                                        @endfor
                                                    </h2>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                <!-- end of table col-lg-6 -->


                                <!-- end of table col-lg-6 -->
                            </div>
                            <!-- end of row -->
                        </div>
                        <!-- end of general info -->
                    </div>
                    <!-- end of col-lg-12 -->
                </div>
                <!-- end of row -->
            </div>
            <!-- end of view-info -->

        </div>
        <!-- end of card-block -->
    </div>
</div>


@endsection
