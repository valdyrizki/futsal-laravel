<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-Futsal</title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
     <![endif]-->

     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

     {{-- Example
     <link href="{{ asset('asset/css/font-awesome.min.css') }}" rel="stylesheet"> --}}

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
 <body class="sidebar-mini fixed">

    <!-- Row start -->
    @if (Session::get('keterangan'))
    @include('layouts.partials.notification',['keterangan' => Session::get('keterangan'), 'tipe' => Session::get('tipe')])
@endif

@if ($errors)
    @foreach ($errors->all() as $error)
        @include('layouts.partials.notification',['keterangan' => $error, 'tipe' => 'danger'])
    @endforeach
@endif

    <div class="loader-bg">
        <div class="loader-bar">
        </div>
    </div>
    <div class="wrapper">
    <!--   <div class="loader-bg">
    <div class="loader-bar">
    </div>
</div> -->
<!-- Navbar-->
@include('layouts.partials.navbar')

    <!-- Side-Nav-->
    @include('layouts.partials.sidebar')
    <!-- Sidebar chat start -->
    @include('layouts.partials.chats')


<!-- Sidebar chat end-->
<div class="content-wrapper">

   <!-- Container-fluid starts -->
   <!-- Main content starts -->
   <div class="container-fluid">
    <div class="row">
        <div class="main-header">
            <h4>@yield('title')</h4>
        </div>
    </div>
    <!-- 4-blocks row start -->

    <!-- KONTEN -->
@yield('content')

</div>
<!-- Main content ends -->
<!-- Container-fluid ends -->
<div class="fixed-button">
    <a href="#" class="btn btn-md btn-primary">
      <i class="fa fa-shopping-cart" aria-hidden="true"></i> Booking Lapang
    </a>
</div>
</div>
</div>

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


      <script>
        var $window = $(window);
        var nav = $('.fixed-button');
        $window.scroll(function(){
            if ($window.scrollTop() >= 200) {
             nav.addClass('active');
         }
         else {
             nav.removeClass('active');
         }
     });
    </script>
</body>

</html>
