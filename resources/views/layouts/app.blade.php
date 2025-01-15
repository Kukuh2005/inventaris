<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/modules/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{asset('assets/modules/datatables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('assets/modules/simple-weather/jquery.simpleWeather.min.css')}}"> -->
    <!-- <link rel="stylesheet" href="{{asset('assets/modules/summernote/summernote-bs4.css')}}"> -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');

    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('layouts.navigation')
            @include('layouts.sidebar')

            <!-- Main Content -->
            @yield('content')
            <div class="main-content">
                <!-- <section class="section">
                      <div class="section-header">
                          <h1>Dashboard</h1>
                      </div>

                      <div class="section-body">
                      </div>
                  </section>
              </div> -->
            </div>
            @include('layouts.footer')
        </div>

        <!-- General JS Scripts -->
        <script src="{{asset('assets/modules/jquery.min.js')}}"></script>
        <script src="{{asset('assets/modules/popper.js')}}"></script>
        <script src="{{asset('assets/modules/tooltip.js')}}"></script>
        <script src="{{asset('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
        <script src="{{asset('assets/modules/moment.min.js')}}"></script>
        <script src="{{asset('assets/js/stisla.js')}}"></script>

        <!-- JS Libraies -->
        <!-- <script src="{{asset('assets/modules/simple-weather/jquery.simpleWeather.min.js')}}"></script> -->
        <script src="{{asset('assets/modules/chart.min.js')}}"></script>
        <!-- <script src="{{asset('assets/modules/jqvmap/dist/jquery.vmap.min.js')}}"></script> -->
        <!-- <script src="{{asset('assets/modules/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script> -->
        <!-- <script src="{{asset('assets/modules/summernote/summernote-bs4.js')}}"></script> -->
        <!-- <script src="{{asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script> -->
        <!-- <script src="{{asset('assets/modules/jquery-ui/jquery-ui.min.js')}}"></script> -->

        <!-- Page Specific JS File -->
        <script src="{{asset('assets/js/page/index-0.js')}}"></script>
        <script src="{{asset('assets/js/page/modules-sweetalert.js')}}"></script>
        <script src="{{asset('assets/modules/sweetalert/sweetalert.min.js')}}"></script>
        <script src="{{asset('assets/js/page/modules-sweetalert.js')}}"></script>
        <script src="{{asset('assets/modules/datatables/datatables.min.js')}}"></script>
        <script src="{{asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
        <!-- Template JS File -->
        <script src="{{asset('assets/js/scripts.js')}}"></script>
        <script src="{{asset('assets/js/custom.js')}}"></script>

        <script src="{{asset('assets/modules/jquery.sparkline.min.js')}}"></script>
        <!-- <script src="{{asset('assets/modules/owlcarousel2/dist/owl.carousel.min.js')}}"></script> -->
        <!-- <script src="{{asset('assets/modules/summernote/summernote-bs4.js')}}"></script> -->
        <!-- <script src="{{asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script> -->

        @stack('script')

        <script>
            $(document).ready(function(){
                $('#data-table').DataTable();
            });
        </script>

        @if(session('sukses'))
        <script>
            $(function() {
                swal({
                    title: 'Success',
                    text: "{{ session('sukses') }}",
                    icon: 'success',
                    buttons: false,
                    timer: 2000,
                });
            });
        </script>
        @elseif(session('gagal'))
        <script>
            $(function() {
                swal({
                    title: 'Failed',
                    text: "{{ session('gagal') }}",
                    icon: 'warning',
                    buttons: true,
                });
            });
        </script>
        @endif
</body>

</html>
