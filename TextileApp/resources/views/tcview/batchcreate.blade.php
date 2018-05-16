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
<td>
        <label>Financial Year:</label><br>
        <select class="form-control" id="sel1" name="fiscalyear" required>
        <option value="">-----Select Academic Year-----</option>
        <option value="2018-2019">2018-2019</option>
        <option value="2019-2020">2019-2020</option>
        </select>    
</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><label>Batch Name:</label><br>
<input class="form-control" type="text" name="batchname" required><br></td>
</tr>
<tr>
<td><label>Start Date:</label><br>
<input  class="form-control" type="date" name="startdate" required><br></td>	
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><label>End Date:</label><br>
<input  class="form-control" type="date" name="enddate" required><br></td>
</tr>
<tr><td colspan="1"><label>Number of Candidates:</label><br>
<input class="form-control" type="number" name="noofstud" required></td><br><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><label>Training Type:</label><br>
<input  class="form-control" type="text" name="trainingtype" required><br></td></tr>
<tr><td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td colspan="1"><br><button type="submit" class="btn btn-primary" style="width: 100%;">Submit</button></td></tr>
</table>
</form>
</div>
</div>
@stop