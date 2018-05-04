<!doctype html>
<html>
<head>
    <link rel="stylesheet" type="text/css" ref="{{ asset('css/style.css') }}" >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('includes.head')
</head>
<body>
<style type="text/css">
    body {
        overflow: hidden;
    }
    #content {
        max-height: calc(100% - 255px);
        overflow-y: scroll;
        padding: 0px 10% !important;
        margin-top: 120px !important;
    }

html, body {
    height: 100%;
    width: 100%;
    margin: 0;
    padding: 0;
}
header {
    width: 100%;
    height: 120px;
    /*background: red;*/
    position: fixed;
    top: 0;
}

footer {
    width: 100%;
    height: 135px;
    /*background: red;*/
    position: fixed;
    bottom: 0;
}
</style>
<!-- <div> -->

    <header class="navbar-fixed-top" id="head">
        @include('includes.header')
    </header>
    <!-- <div id="main" class="class="container-fluid"">     -->
        <!-- main content -->
        <div id="content">
            @yield('content')
        </div> 
    <!-- </div> -->
    <footer id="foot" >
        @include('includes.footer')
    </footer>

<!-- </div> -->
</body>
</html>