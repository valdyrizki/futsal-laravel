@extends('layouts.app')
@section('title','Dashboard')

@section('content')
    <div class="row m-b-30 dashboard-header">

                <div class="col-lg-3 col-sm-6">
                    <div class="col-sm-12 card dashboard-product">
                        <span>Products</span>
                        <h2 class="dashboard-total-products counter">4500</h2>
                        <span class="label label-warning">Orders</span>New Orders
                        <div class="side-box bg-warning">
                            <i class="icon-social-soundcloud"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="col-sm-12 card dashboard-product">
                        <span>Products</span>
                        <h2 class="dashboard-total-products counter">37,500</h2>
                        <span class="label label-primary">Sales</span>Last Week Sales
                        <div class="side-box bg-primary">
                            <i class="icon-social-soundcloud"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="col-sm-12 card dashboard-product">
                        <span>Products</span>
                        <h2 class="dashboard-total-products">$<span class="counter">30,780</span></h2>
                        <span class="label label-success">Sales</span>Total Sales
                        <div class="side-box bg-success">
                            <i class="icon-bubbles"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="col-sm-12 card dashboard-product">
                        <span>Products</span>
                        <h2 class="dashboard-total-products">$<span class="counter">30,780</span></h2>
                        <span class="label label-danger">Views</span>Views Today
                        <div class="side-box bg-danger">
                            <i class="icon-bubbles"></i>
                        </div>
                    </div>
                </div>

            </div>
            <!-- 4-blocks row end -->
            <!-- 1-3-block row start -->

        <!-- 1-3-block row end -->



<!-- 3-1-block end -->

<!-- 2-1 block start -->
<div class="row">
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
                        <label class="label label-primary">Rp.{{$l->harga_lapang}}</label>
                    </div>
                </div>
                <div class="user-block-2-activities">
                    <div class="user-block-2-active">
                        <i class="icofont icofont-star"></i> Rating
                    <label class="label label-primary">
                    {{Fungsi::getRating($l->id_lapang)}}
                    </label>
                    </div>
                </div>

                <div class="user-block-2-activities">
                    <div class="user-block-2-active">
                        <i class="icofont icofont-ui-user"></i> Status
                        <label class="label label-primary">@include('layouts.partials.statuslapang')</label>
                    </div>

                </div>
                <div class="text-center">
                    <a href="/bookingm">
                        <button type="button" class="btn btn-primary waves-effect waves-light text-uppercase">
                            Booking
                        </button>
                    </a>
                    <a href="/lapang/{{$l->id_lapang}}/detail">
                        <button type="button" class="btn btn-info waves-effect waves-light text-uppercase">
                            Detail Lapang
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>
<!-- 2-1 block end -->

@endsection
