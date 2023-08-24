<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{asset('/storage/logo/'.$setting->favicon)}}">
    @yield('mate')
    @include('backend.layouts.inc.styles')
    <title>@yield('title', "Dashboard | Admin Panel")</title>
</head>
<body>