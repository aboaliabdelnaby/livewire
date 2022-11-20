<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designreset.com/cork/ltr/demo4/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Jul 2021 10:07:04 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{ $title }}</title>
    <link rel="icon" type="image/x-icon" href="{{asset('admin/assets/img/favicon.ico')}}"/>
    <link href="{{asset('admin/assets/css/loader.css" rel="stylesheet" type="text/css')}}"/>
    <script src="{{asset('assets/js/loader.js')}}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('admin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{asset('admin/plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/assets/css/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{asset('admin/plugins/sweetalerts/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/plugins/sweetalerts/sweetalert.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/components/custom-sweetalert.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    @livewireStyles
{{ $css ?? '' }}
</head>
<body>
