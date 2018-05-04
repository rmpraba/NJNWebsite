<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
@extends('layouts.sidebar')

@section('content')
<!-- <style type="text/css">
	.lbl{
		font-weight: bold;
		font-size: 17px;
	}
	#heading{
		color:#b30000;
	}
	.input{
		width: 250px;
	}
	.btn-primary, .btn-primary:hover, .btn-primary:active, .btn-primary:visited {
    background-color: #b30000 !important;
    }
    #editbatchlistcontainer{
    	margin-top: 5%;
    	margin-bottom: 2%;
    }
</style> -->
<div class="row" id="editbatchlistcontainer">
<div id="sidebar" class="col-md-3">
@include('includes.sidebar')
</div>
<div id="targetcontent" class="col-md-9">
<h1 id="heading">Update Batch List</h1>
<form action="/updatebatchinfo" method="post">
{{csrf_field()}}
<table style="width: 80%;" cellspacing="15">
@foreach($batchinfo as $row)
<tr>
<td><label class="lbl">Batch Name:</label><br>
<input class="input" type="text" name="batchname" value="{{ $row -> batch_name }}" required><br></td>
<td><input class="input" type="hidden" name="batchid" value="{{ $row -> batch_id }}"></td>
<td><label  class="lbl">Training Type:</label><br>
<input  class="input" type="text" name="trainingtype"  value="{{ $row -> training_type }}"  required><br></td>
</tr>
<tr>
<td><label  class="lbl">Start Date:</label><br>
<input  class="input" type="date" name="startdate" value="{{  $startdate }}"  required><br></td>	
<td></td>
<td><label  class="lbl">End Date:</label><br>
<input  class="input" type="date" name="enddate" value="{{ $enddate }}"  required><br></td>
</tr>
<tr><td colspan="1"><label class="lbl">Number of Candidates:</label><br>
<input class="input" type="number" name="noofstud" value="{{ $row -> no_of_stud }}"  required></td><br><td></td>
<td colspan="1"><br><button type="submit" class="btn btn-primary" style="width: 80%;">Update</button></td></tr>
@endforeach
</table>
</form>
</div>
</div>
@stop