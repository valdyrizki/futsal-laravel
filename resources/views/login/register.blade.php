<!DOCTYPE html>
<html lang="en">
<head>
	<title>Able Pro Responsive Bootstrap 4 Admin Template by Phoenixcoded</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="description" content="Phoenixcoded">
	<meta name="keywords"
	content=", Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
	<meta name="author" content="Phoenixcoded">

	<!-- Favicon icon -->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <!-- iconfont -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/icofont/css/icofont.css') }}">

    <!-- simple line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/simple-line-icons/css/simple-line-icons.css') }}">

    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">

    <!-- Weather css -->
    <link href="{{ asset('assets/css/svg-weather.css') }}" rel="stylesheet')">

    <!-- Echart js -->
    <script src="{{ asset('assets/plugins/charts/echarts/js/echarts-all.js') }}"></script>

    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">

    <!-- Responsive.css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">

    <!--color css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/color/color-1.min.css') }}" id="color"/>

</head>
<body>



	<section class="login common-img-bg">
		<!-- Container-fluid starts -->
		<div class="container-fluid">
			<div class="row">
					<div class="col-sm-12">
						<div class="login-card card-block bg-white">
                            <form class="md-float-material" action="/prosesregister" method="POST">
                                @csrf
								<div class="text-center">
									<img src="assets/images/logo-blue.png" alt="logo">
								</div>
                                <h3 class="text-center txt-primary">Create an account </h3>

                                @if (Session::get('keterangan'))
                                <div class="alert alert-success">{{Session::get('keterangan')}}</div>
                                @endif

                                @if ($errors)
                                    @foreach ($errors->all() as $error)
                                    <div class="alert alert-success">{{$error}}</div>
                                    @endforeach
                                @endif

                                    <div class="form-group">
                                            <label>Nama</label>
										<input type="text" class="md-form-control" required="" name="name">
                                    </div>
                                    <div class="form-group">
                                            <label>No HP</label>
										<input type="number" class="md-form-control" required="" name="nohp">
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="email" class="md-form-control" required="" name="email">
									</div>
									<div class="form-group">
                                            <label>Password</label>
										<input type="password" class="md-form-control" required="" name="password">
									</div>

								<div class="col-xs-10 offset-xs-1">
								<input type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light m-b-20">
								</div>
									<div class="row">
										<div class="col-xs-12 text-center">
											<span class="text-muted">Sudah punya akun?</span>
											<a href="/login" class="f-w-600 p-l-5"> Login disini</a>

										</div>
									</div>
							</form>
							<!-- end of form -->
						</div>
						<!-- end of login-card -->
					</div>
					<!-- end of col-sm-12 -->
				</div>
				<!-- end of row-->
			</div>
			<!-- end of container-fluid -->
	</section>


<!-- Required Jqurey -->
<script src="{{ asset('assets/plugins/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/plugins/tether/dist/js/tether.min.js') }}"></script>


<!-- Required Fremwork -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- waves effects.js -->
<script src="{{ asset('assets/plugins/Waves/waves.min.js') }}"></script>

<!-- Scrollbar JS-->
<script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery.nicescroll/jquery.nicescroll.min.js') }}"></script>

<!--classic JS-->
<script src="{{ asset('assets/plugins/classie/classie.js') }}"></script>

<!-- notification -->
<script src="{{ asset('assets/plugins/notification/js/bootstrap-growl.min.js') }}"></script>


<!-- Rickshaw Chart js -->
<script src="{{ asset('assets/plugins/d3/d3.js') }}"></script>
<script src="{{ asset('assets/plugins/rickshaw/rickshaw.js') }}"></script>

<!-- Sparkline charts -->
<script src="{{ asset('assets/plugins/jquery-sparkline/dist/jquery.sparkline.js') }}"></script>

<!-- Counter js  -->
<script src="{{ asset('assets/plugins/waypoints/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/plugins/countdown/js/jquery.counterup.js') }}"></script>

<!-- custom js -->
<script type="text/javascript" src="{{ asset('assets/js/main.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/pages/dashboard.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/pages/elements.js') }}"></script>
<script src="{{ asset('assets/js/menu.min.js') }}"></script>


</body>
</html>
