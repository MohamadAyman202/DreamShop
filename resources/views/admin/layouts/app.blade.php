<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.admin.head')
</head>

<body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid"
    data-rightbar-onstart="true">


    <!-- Begin page -->
    <div class="wrapper">

        @include('includes.admin.nav')
        @include('includes.admin.left_side_menu')
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    @if (Route::currentRouteName() == 'admin.dashboard')
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <form class="d-flex">
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-light"
                                                    id="dash-daterange">
                                                <span class="input-group-text bg-primary border-primary text-white">
                                                    <i class="mdi mdi-calendar-range font-13"></i>
                                                </span>
                                            </div>
                                            <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                                <i class="mdi mdi-autorenew"></i>
                                            </a>
                                            <a href="javascript: void(0);" class="btn btn-primary ms-1">
                                                <i class="mdi mdi-filter-variant"></i>
                                            </a>
                                        </form>
                                    </div>
                                    <h4 class="page-title">@yield('title-page')</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                    @endif
                    @if (Route::currentRouteName() != 'admin.dashboard')
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a
                                                    href="@yield('url')">@yield('link1')</a>
                                            </li>
                                            <li class="breadcrumb-item active">@yield('link2')</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">@yield('title-page')</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                    @endif

                    @yield('content')
                    @include('includes.admin.footer')
                </div>
            </div>
        </div>

    </div>
    @include('includes.admin.right_sidebar')
    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->
    @include('includes.admin.scripts')
</body>

</html>
