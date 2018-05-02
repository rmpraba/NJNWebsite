@extends('layouts.sidebar')

@section('content')



<style type="text/css">
	.input{
		width:200px;
	}
	table{
		width:300px;
	}
	.lbl{
		font-weight: bold;
		font-size: 17px;
	}
	#heading{
		color:#b30000;
	}
	#div1{
		height:400px;
		width:370px;
		float:left;
	}
	#div2{
		height:300px;
		width:300px;
		float:left;
		margin:0px 0px 100px 200px;
	}
	.btn-primary, .btn-primary:hover, .btn-primary:active, .btn-primary:visited {
    background-color: #b30000 !important;
    }


</style>

<div id="div1">
@include('includes.sidebar')
</div>
<div id="div2">
<h1 id="heading" align="Center" >Batch Creation</h1><br><br>
<form action="" method="post">
{{csrf_field()}}
<table>
<tr>
<td><label class="lbl">Batch Name:</label>
<input class="input" type="text" name="batchname"></td>
<td>&nbsp&nbsp</td>
<td><label  class="lbl">Training Type:</label>
<input  class="input" type="text" name="trainingtype"></td>
</tr>
<tr><td>&nbsp</td><td>&nbsp&nbsp</td>
<td>&nbsp</td></tr>
<tr><td><label class="lbl">Number of Candidates:</label>
<input class="input" type="number" name="noofstud"></td></tr>
<tr>
<tr><td>&nbsp</td><td>&nbsp&nbsp</td>
<td>&nbsp</td></tr>
<td><label  class="lbl">Start Date:</label>
<input  class="input" type="date" name="startdate"></td>	
<td>&nbsp&nbsp</td>
<td><label  class="lbl">End Date:</label>
<input  class="input" type="date" name="enddate"></td>
</tr>
<tr><td>&nbsp</td><td>&nbsp&nbsp</td><td>&nbsp</td></tr>


<tr><td>&nbsp</td><td>&nbsp</td></tr>
<tr><td>&nbsp &nbsp</td><td>&nbsp</td>
<td><button type="submit" class="btn btn-primary" style="margin-left: 50%;width: 30%;">Submit</button></td><td>&nbsp&nbsp</td>
</tr>

</table>
</form>
</div>

@stop