<?php
/**
 * User: mcsere
 * Date: 9/2/14
 * Time: 1:31 PM
 * Contact: miki@softwareengineer.ro
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Test</title>

    <link rel="shortcut icon" href="/static/images/icon.jpg" type="images/icon"/>

    <link rel="stylesheet" href="/static/vendor/bootstrap/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/static/vendor/bootstrap/dist/css/bootstrap-theme.min.css"/>
    <link rel="stylesheet" href="/static/vendor/datatables/media/css/jQuery.dataTables.min.css"/>
    <!-- Custom Fonts -->
    <link href="/static/vendor/components-font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="/static/css/index.css" rel="stylesheet" type="text/css"/>

</head>

<body>
<div id="wrapper">

    @include('templates.menu')

    <div id="page-wrapper">
        @yield('content')
        @include('templates.footer')
    </div>


    <script src="/static/vendor/jquery/dist/jquery.min.js"></script>

    <script src="/static/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="/static/vendor/datatables/media/js/jquery.dataTables.min.js"></script>

    @yield('custom-javascript')
</div>
</body>
</html>