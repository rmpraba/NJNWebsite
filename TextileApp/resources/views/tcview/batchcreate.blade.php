<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
@extends('layouts.sidebar')
@section('content')
<div class="row" id="batchcreatecontainer">
<div id="sidebar" class="col-md-3">
@include('includes.sidebar')
</div>
<div id="targetcontent" class="col-md-9">
<h1 id="heading">Batch Creation</h1>
<form action="" method="post">
{{csrf_field()}}
<table style="width: 80%;" cellspacing="15">
<tr>
<td><label class="lbl">Batch Name:</label><br>
<input class="input" type="text" name="batchname" required><br></td>
<td></td>
<td><label  class="lbl">Training Type:</label><br>
<input  class="input" type="text" name="trainingtype" required><br></td>
</tr>
<tr>
<td><label  class="lbl">Start Date:</label><br>
<input  class="input" type="date" name="startdate" required><br></td>	
<td></td>
<td><label  class="lbl">End Date:</label><br>
<input  class="input" type="date" name="enddate" required><br></td>
</tr>
<tr><td colspan="1"><label class="lbl">Number of Candidates:</label><br>
<input class="input" type="number" name="noofstud" required></td><br><td></td>
<td colspan="1"><br><button type="submit" class="btn btn-primary" style="width: 80%;">Submit</button></td></tr>
</table>
</form>
</div>
</div>
@stop