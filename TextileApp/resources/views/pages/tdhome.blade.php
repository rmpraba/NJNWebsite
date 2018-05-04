<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
@extends('layouts.sidebar')
@section('content')
<!-- <style type="text/css">
	#tdhomemain{
		margin-top: 5%;
		margin-bottom: 2%;
	}
</style> -->
 <div id="tdhomemain" class="row">
        <!-- sidebar content -->
        <div id="sidebar" class="col-md-4">
            @include('includes.tdsidebar')
        </div>
        <!-- main content -->
        <div id="content" class="col-md-8">
            Textile Department Home
        </div>
 </div>    
@stop