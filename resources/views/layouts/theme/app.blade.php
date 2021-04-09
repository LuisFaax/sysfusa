<!DOCTYPE html>
<html class="loading" lang="es" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Sistema de gestión judicial Fusa">
    <meta name="keywords" content="sistema,web,demandas,radicaciones,actuaciones,historiales,estadísticas">
    <meta name="author" content="LUISFAX">
    <title>
     Sistema de Gestión Judicial - Fusa ::  @yield('title')
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- BEGIN: Vendor CSS-->
        @include('layouts.theme.styles')
    <!-- END: Custom CSS-->

     @livewireStyles

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 2-columns  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
        @include('layouts.theme.header')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->

       @include('layouts.theme.navbar')

    <!-- END: Main Menu-->


    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                
                @yield('content')

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
     @include('layouts.theme.footer')
    <!-- END: Footer-->


    <!-- BEGIN: scripts-->
     @include('layouts.theme.scripts')

      @livewireScripts
    <!-- END: scripts-->

</body>
<!-- END: Body-->

</html>