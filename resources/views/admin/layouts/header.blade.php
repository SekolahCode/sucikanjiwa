<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{ $title }} - Sucikan Jiwa Admin</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('custom/favicon_io/favicon.ico') }}"/>
    <link href="{{ asset('cork/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('cork/js/loader.js') }}"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('cork/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('cork/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    @if($title == 'Dashboard')
    <link href="{{ asset('cork/plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('cork/css/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css" />
    @elseif($title == 'Profile')
    <link href="{{ asset('cork/css/users/user-profile.css') }}" rel="stylesheet" type="text/css" />
    @elseif($title == 'Article')
    <link href="{{ asset('cork/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('cork/plugins/editors/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('cork/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" />
    @endif
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>