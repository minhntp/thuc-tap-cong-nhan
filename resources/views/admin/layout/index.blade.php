<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>

<head>
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <base href="{{asset('')}}" >
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Bootstrap Core CSS -->
    <link href="admin_asset/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="admin_asset/css/style.css" rel='stylesheet' type='text/css' />
    <link href="admin_asset/css/my-style.css" rel='stylesheet' type='text/css' />
    <!-- Graph CSS -->
    <link href="admin_asset/css/lines.css" rel='stylesheet' type='text/css' />
    <link href="admin_asset/css/font-awesome.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="admin_asset/js/jquery.min.js"></script>
    <!----webfonts--->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <!---//webfonts--->
    <!-- Nav CSS -->
    <link href="admin_asset/css/custom.css" rel="stylesheet">
    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin_asset/js/metisMenu.min.js"></script>
    <script src="admin_asset/js/custom.js"></script>
    <!-- Graph JavaScript -->
    <script src="admin_asset/js/d3.v3.js"></script>
    <script src="admin_asset/js/rickshaw.js"></script>
</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
           @include('admin.layout.header')
           @include('admin.layout.menu')      
        </nav>
        <div id="page-wrapper">
        @yield('content')
        </div>
        
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <script src="admin_asset/js/bootstrap.min.js"></script>
    @yield('script')
</body>

</html>