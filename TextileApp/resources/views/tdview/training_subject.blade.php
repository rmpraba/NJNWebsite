<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
@extends('layouts.sidebar')
@section('content')
<div class="row" id="batchcreatecontainer">
<div id="sidebar" class="col-md-3">
@include('includes.tdsidebar')
</div>
<div id="targetcontent" class="col-md-9">
<h1 id="heading">Create Training Subject</h1>
<form action="/createsubject" method="post">
{{csrf_field()}}
<table style="width: 80%;" cellspacing="15">
<tr>
<td><label class="lbl">Subject Name:</label><br>
<input id="ctname" class="input" type="text" name="subjectname" required ><br></td>
</tr>
<tr>
<td colspan="1"><br><button type="submit" class="btn btn-primary" width="100%">Submit</button></td></tr>
</table>
</form>
</div>
</div>
@stop