<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Dashboard </title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>



@component('mail::message')
    # Verification Message {{ $code }}


    Thanks
@endcomponent


</html>
