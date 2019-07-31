@extends('layouts.app')

@section('title','Edit Lapang')

@section('content')
<!-- Checkbox start -->
			<!-- Row start -->
			<div class="row">
				<div class="col-md-12">
                    <div class="card">
                        <div class="card-block">
                            <div class="container">
                                <form method="POST" action="/lapang/{{$lapang->id_lapang}}/edit" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    @include('lapang.partials.form',[
                                        'submit_button' => 'Update'
                                    ])

                                    <a href="/lapang">Back </a>

                                </form>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
            <!-- Row end -->


@endsection
