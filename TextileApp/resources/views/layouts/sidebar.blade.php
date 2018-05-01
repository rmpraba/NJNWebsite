<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<style type="text/css">
            html, body {
                margin: 0;
                height: 100%;
                position: fixed;
            }
            .container{
                margin: 0;
                width: 100%;
                height: 100%;
                position: fixed;
            }
            #head{
                width: 100%;
                /*height: 10%;*/
                position: fixed;
            }
            #main{
                width: 100%;
                height: 60%; 
                margin-top: 10%; 
                overflow: scroll;
                position: fixed;
            }    
            #foot{
                width: 100%;
                /*height: 80%;*/
                position: fixed;
                margin-top: 30%; 
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