<!-- 
<style type="text/css">
.sidenav {
    /*width: 100%;*/
    /*position: fixed;*/
    z-index: 1;
    top: 10%;
    margin-left: 20%;
    background: #484848;
    overflow-x: hidden;
    padding: 8px 0;
    border-radius: 1px;
}

.sidenav a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 17px;
    color: #FFFFFF;
    display: block;
    font-family: roboto;
    border-bottom: 1px solid black;
}

.sidenav a:hover {
    color: #b30000;
}
</style> -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
<div class="sidenav">
  <a href="{{ URL::to('batchcreate') }}">Create Batch</a>  
  <a href="{{ URL::to('batchlist') }}">Batch List</a>
  <a href="{{ URL::to('pftarget') }}">Physical & Financial Target</a>
  <a href="{{ URL::to('viewpftarget') }}">View Target</a>
</div>