@extends('layouts.sidebar')
@section('content')
<style type="text/css">
	#tchomemain{
		margin-top: 5%;
		margin-bottom: 2%;
	}
</style>
 <div id="tchomemain" class="row">
        <!-- sidebar content -->
        <div id="sidebar" class="col-md-3">
            @include('includes.sidebar')
        </div>
        <!-- main content -->
        <div id="content" class="col-md-9">
            Training Centre Home
        </div>
 </div>    
@stop