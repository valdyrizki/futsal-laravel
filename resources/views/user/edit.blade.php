@extends('layouts.app')

@section('title','Edit User')

@section('content')
<!-- Checkbox start -->
			<!-- Row start -->
			<div class="row">
				<div class="col-md-12">
                    <div class="card">
                        <div class="card-block">
                            <div class="container">
                                <form method="POST" action="/user/{{$user->id}}/update" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    @include('user.partials.form',[
                                        'submit_button' => 'Update'
                                    ])

                                    <a href="/user">Back </a>

                                </form>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
            <!-- Row end -->


@endsection
