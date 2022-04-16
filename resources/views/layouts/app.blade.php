<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>{{ env('APP_NAME', 'Davina\'s CMS') }}</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <!-- <link href="./vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('vendors/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/ionicons-npm/css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/linearicons-master/dist/web-font/style.css') }}">
    <link rel="stylesheet"
        href="{{ asset('vendors/pixeden-stroke-7-icon-master/pe-icon-7-stroke/dist/pe-icon-7-stroke.css') }}">
    <link href="{{ asset('styles/css/base.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/png">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        @include('components.header')
        <div class="app-main">
            @include('components.sidebar')
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                @yield('breadcrumb')
                            </ol>
                        </nav>
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-graph1 icon-gradient bg-mixed-hopes"></i>
                                </div>
                                <div>
                                    @yield('page-title')
                                </div>
                                @yield('page-actions')
                            </div>
                        </div>
                    </div>
                    @yield('content')
                </div>
                @include('components.footer')
            </div>
        </div>
    </div>
    <!-- plugin dependencies -->
    <script type="text/javascript" src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/moment/moment.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/metismenu/dist/metisMenu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/bootstrap4-toggle/js/bootstrap4-toggle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/jquery-circle-progress/dist/circle-progress.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('vendors/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/toastr/build/toastr.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/jquery.fancytree/dist/jquery.fancytree-all-deps.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('vendors/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/bootstrap-table/dist/bootstrap-table.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ asset('./vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('vendors/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/slick-carousel/slick/slick.min.js') }}"></script>
    <!-- custome.js -->
    <script type="text/javascript" src="{{ asset('js/charts/apex-charts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/circle-progress.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/demo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/scrollbar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/toastr.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/treeview.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/form-components/toggle-switch.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/tables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/carousel-slider.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>

</html>
