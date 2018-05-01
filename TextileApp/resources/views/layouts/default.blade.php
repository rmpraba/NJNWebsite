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
</style>
<div class="container">

    <header class="row" id="head">
        @include('includes.header')
    </header>

    <div id="main" class="row" >

            @yield('content')

    </div>

    <footer class="row">
        @include('includes.footer')
    </footer>

</div>
</body>
</html>
