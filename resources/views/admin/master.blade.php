<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/assets/admin/images/icon.png') }}">
    <title>Admin - @yield('pageTitle')</title>
    <link href="{{ asset('public/assets/admin/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- morris CSS -->
    <link href="{{ asset('public/assets/admin/plugins/morrisjs/morris.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('public/assets/admin/css/style.css') }}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{ asset('public/assets/admin/css/colors/blue.css') }}" id="theme" rel="stylesheet">
    
    <!-- Data tables -->


    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!--link rel="stylesheet" type="text/css" href="{{ url('public/assets/admin/plugins/data-tables/css/data-table.min.css') }}"-->
    <link rel="stylesheet" type="text/css" href="{{ url('public/assets/admin/plugins/datatables/extra-plugins/css/data-table-button.css') }}">

    <!-- Sweet alert -->
    <link rel="stylesheet" href="{{ url('public/assets/admin/plugins/sweetalert/sweetalert2.min.css') }}" />
    <!-- Switcher Css -->
    <link href="{{ url('public/assets/admin/plugins/switchery/dist/switchery.min.css') }}" rel="stylesheet" />
    <!-- summernotes CSS -->
    <link href="{{ url('public/assets/admin/plugins/summernote/dist/summernote.css') }}" rel="stylesheet" />

    <!-- include Page CSS -->
    @yield('pageCss')

    <style>
        .dataTables_wrapper .dataTables_processing {
            background: rgba(0, 0, 0, 0.7) none repeat scroll 0 0 !important;
            height: 100% !important;
            left: 0 !important;
            margin-left: 0px !important;
            margin-top: 0 !important;
            padding-top: 20px;
            position: fixed !important;
            text-align: center;
            top: 0;
            width: 100% !important;
            z-index: 999999;
        }

        .dataTables_processing>img {
            background: #ffffff none repeat scroll 0 0;
            border-radius: 8px;
            height: 120px;
            padding: 10px;
            position: relative;
            top: 40%;
            width: 120px;
        }

        .dataTables_processing>img {
            background: #ffffff none repeat scroll 0 0;
            border-radius: 8px;
            height: 120px;
            padding: 10px;
            position: relative;
            top: 40%;
            width: 120px;
        }

        #dataTable_paginate {
            display: none;
        }
    </style>
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- top Header navigation -->
        @include('admin.includes.topbar')
        <!-- /top Header navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('admin.includes.sidebar')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">@yield('pageTitle')</h3>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                @yield('content')
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"><?php if (date('Y') == '2019') { ?> © 2019<?php } else { ?> © 2019-<?php echo date('Y');  } ?> Admin Panel </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
   <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('public/assets/admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('public/assets/admin/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('public/assets/admin/js/jquery.slimscroll.js') }}"></script>
  
    <script src="{{ asset('public/assets/admin/js/sidebarmenu.js') }}"></script>
    <!--stickey kit -->
    <script src="{{ asset('public/assets/admin/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('public/assets/admin/js/custom.min.js') }}"></script>

    <!-- Data Table ---->
    <!--script type="text/javascript" src="{{ asset('public/assets/admin/plugins/data-tables/js/data-table.min.js') }}"></script-->
    <script type="text/javascript" src="{{ asset('public/assets/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/admin/plugins/datatables/extra-plugins/dataTables.buttons.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/admin/plugins/datatables/extra-plugins/buttons.html5.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/admin/plugins/datatables/extra-plugins/buttons.colVis.min.js') }}"></script>


    <!--script src="{{ asset('public/assets/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script-->


    <!-- SweetAlert -->
    <script type="text/javascript" src="{{ asset('public/assets/admin/plugins/sweetalert/sweetalert2.min.js') }}"></script>

    <!-- Switcher Js -->
    <script src="{{ asset('public/assets/admin/plugins/switchery/dist/switchery.min.js') }}"></script>
    <!-- Style switcher -->
    <script src="{{ asset('public/assets/admin/plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>

    <!-- summernotes JS -->
    <script src="{{ asset('public/assets/admin/plugins/summernote/dist/summernote.min.js') }}"></script>
        <!-- Range Date picker -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
  

    

    
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--sparkline JavaScript -->
    <!--script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script-->
    <!--morris JavaScript -->
    <!--script src="../assets/plugins/raphael/raphael-min.js"></script-->
    <!--script src="../assets/plugins/morrisjs/morris.min.js"></script-->
    <!-- Chart JS -->
    <!--script src="js/dashboard1.js"></script-->
    <!-- ============================================================== -->
    <!-- Include page js script here -->
    @yield('pagejs')
    <script>
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
        });
    </script>
</body>

</html>