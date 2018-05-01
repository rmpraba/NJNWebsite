<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<style type="text/css">
            html, body {
                margin: 0;
                height: 100vh;
            }
            main{
                 height: 110vh;  
            }

</style>
<div class="container">

    <header class="row" id="head">
        @include('includes.header')
    </header>

    <div id="main" class="row scroll-area">
    
        <!-- main content -->
        <div id="content" class="col-md-11">
            @yield('content')
        </div>

    </div>

    <footer class="row" id="foot">
        @include('includes.footer')
    </footer>

</div>
</body>
</html>