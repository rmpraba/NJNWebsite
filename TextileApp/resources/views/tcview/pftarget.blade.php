<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
@extends('layouts.sidebar')
@section('content')
<style type="text/css">
	.tinf
	{
		width:75px;
	}
    .btn-primary, .btn-primary:hover, .btn-primary:active, .btn-primary:visited {
    background-color: #b30000 !important;
    }
</style>
 <div id="main" class="row">
        <!-- sidebar content -->
        <div id="sidebar" class="col-md-4">
            @include('includes.sidebar')
        </div>
        <!-- main content -->
        <div id="content" class="col-md-8">
    <center><h1 style="color: #b30000;"> Physical & Financial Target </h1></center>
    <form action="/insertpftarget" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="districtcode" hidden>
    <!-- <span data-field="districtcode" id="districtcode" name="districtcode" hidden></span> -->
    <table style="width: 100%;">
 	<tr>
 		<td ></td><td>&nbsp&nbsp&nbsp&nbsp</td><th style="text-align: right;">District:<span data-field="district" id="district" name="district"></span>
 		<br>Division:<span data-field="division" id="division" name="division"></span></th>
    </tr>
    <tr><td>&nbsp</td><td>&nbsp&nbsp&nbsp&nbsp</td><td>&nbsp</td></tr>
    <tr>
    <td>
    <div class="form-group">
    	<label>Financial Year:</label><br>
    	<select class="form-control" id="sel1" name="fiscalyear" required>
        <option value="">-----Select Academic Year-----</option>
        <option value="2018-2019">2018-2019</option>
        <option value="2019-2020">2019-2020</option>
        </select>
    </div>
    </td><td></td>
    <td>
        <div class="form-group">
                <label>Select Training Centre:</label><br>
                <select name="tc" class="form-control" style="width:350px" required>
                    <option value="">--- Select TC ---</option>
                    @foreach ($tcs as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
        </div>
    </td>
    </tr>
    <tr>
    	<td>
    		<div class="form-group">
                <label>Select Batch:</label><br>
                <select name="batch" class="form-control" style="width:350px" required>
                <!-- <option value="">--- Select Batch ---</option> -->
                </select>
            </div>
    	</td>
    	<td></td>
        <th><div class="form-group">
        <label>Batch Timing:</label><br>
        <!-- <span data-field="timing"></span> -->
        <input type="text" class="form-control" id="timing" name="timing" required readonly>
        </div>
        </th>
    </tr>
    <tr><td>&nbsp</td><td></td><td>&nbsp</td></tr>
    <tr>
    	<th>Category Type:<span data-field="type" id="type" name="type"></span>
    	</th><td></td>
    	<th>Training Subject:<span data-field="subject" id="subject" name="subject"></th>
    </tr>    
</table> <br><br>

<table class="table table-bordered" >
	<tr>
		<th rowspan="2">Sl no</th><th rowspan="2">Category type</th><th colspan="3">Physical target in no</th><th colspan="3">Finacial target in Rs</th>
	</tr>
	<tr>
		<td>Male</td><td>Female</td><td>Total</td><td>Male</td><td>Female</td><td>Total</td>
	</tr>
	<tr>
		<td>1</td><th>General</th>
		<td><input required class="tinf" type="number" name="genpm" id="one" OnChange="av(this)"></td>
		<td><input required class="tinf" type="number" name="genpf" id="two" OnChange="av(this)"></td>
		<td><input required class="tinf" type="number" name="genpt" id="avvy" value="" readonly></td>
		<td><input required class="tinf" type="number" name="genfm" id="three" OnChange="av(this)"></td>
		<td><input required class="tinf" type="number" name="genff" id="four" OnChange="av(this)"></td>
		<td><input required class="tinf" type="number" name="genft" id=avvy1 value="" readonly></td>	
	</tr>
	<tr>
		<td>2</td><th>SCP</th>
		<td><input required class="tinf" type="number" name="scppm" id="five" OnChange="av(this)"></td>
		<td><input required class="tinf" type="number" name="scppf" id="six" OnChange="av(this)"></td>
		<td><input required class="tinf" type="number" name="scppt" id="avvy2" value="" readonly></td>
		<td><input required class="tinf" type="number" name="scpfm" id="seven" OnChange="av(this)"></td>
		<td><input required class="tinf" type="number" name="scpff" id="eight" OnChange="av(this)"></td>
		<td><input required class="tinf" type="number" name="scpft" id="avvy3" value="" readonly></td>		
	</tr>
	<tr>
		<td>3</td><th>TSP</th>
		<td><input required class="tinf" type="number" name="tsppm" id="nine" OnChange="av(this)"></td>
		<td><input required class="tinf" type="number" name="tsppf" id="ten" OnChange="av(this)"></td>
		<td><input required class="tinf" type="number" name="tsppt" id="avvy4" value="" readonly></td>
		<td><input required class="tinf" type="number" name="tspfm" id="leven" OnChange="av(this)"></td>
		<td><input required class="tinf" type="number" name="tspff" id="twel" OnChange="av(this)"></td>
		<td><input required class="tinf" type="number" name="tspft" id="avvy5" value="" readonly></td>		
	</tr>
    <tr>
        <td>4</td><th>Minorities</th>
        <td><input required class="tinf" type="number" name="minpm" id="thirteen" OnChange="av(this)"></td>
        <td><input required class="tinf" type="number" name="minpf" id="fourteen" OnChange="av(this)"></td>
        <td><input required class="tinf" type="number" name="minpt" id="avvy6" value="" readonly></td>
        <td><input required class="tinf" type="number" name="minfm" id="fifteen" OnChange="av(this)"></td>
        <td><input required class="tinf" type="number" name="minff" id="sixteen" OnChange="av(this)"></td>
        <td><input required class="tinf" type="number" name="minft" id="avvy7" value="" readonly></td>      
    </tr>
	<tr>
		<td></td><th>Total</th>
		<td><input required class="tinf" type="number" name="totpm" id="t0" value="" readonly></td>
		<td><input required class="tinf" type="number" name="totpf" id="t1" value="" readonly></td>
		<td><input required class="tinf" type="number" name="totpt" id="t2" value="" readonly></td>
		<td><input required class="tinf" type="number" name="totfm" id="t3" value="" readonly></td>
		<td><input required class="tinf" type="number" name="totff" id="t4" value="" readonly></td>
		<td><input required class="tinf" type="number" name="totft" id="t5" value="" readonly></td>		
	</tr>
</table>
<button type="submit" class="btn btn-primary" style="margin-left: 70%;width: 30%;">Submit</button>
</form>
</div>
</div>    
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="tc"]').on('change', function() {
            var tc = $(this).val();
            if(tc) {
                $.ajax({
                    url: '/pftarget/ajax/'+tc,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {                       
                        $('select[name="batch"]').empty();
                        // $('select[name="batch"]').append('<option value="'select'">-----Select-----</option>');
                        $.each(data, function(key, value) {
                            $('select[name="batch"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }

                });
            }else{
                $('select[name="batch"]').empty();
            }
        });
        $('select[name="batch"]').on('change', function() {
            var batch = $(this).val();
            // alert(batch);
            if(batch) {
                $.ajax({
                    url: '/pftarget/batchajax/'+batch,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {  
                        // alert('success');
                    $("input[name='timing']").val("From: "+ data[0].start_date+" To: "+data[0].end_date);
                    $("[data-field='subject']").text(data[0].batch_type);
                    $("[data-field='type']").text(data[0].centre_type);
                    $("[data-field='district']").text(data[0].district_name);
                    $("[data-field='division']").text(data[0].division);
                    $("input[name='districtcode']").val(data[0].district_id);
                    },
                    error: function(e) {
                        // alert('fail');
                    console.log(e.responseText);
                    }
                });
            }else{
                $('select[name="batch"]').empty();
            }
        });
    });
</script>
<script type="text/javascript">
function av(avSelect)
{
var one=avSelect.form.one.value;
var two=avSelect.form.two.value;
var avvy=parseFloat(one)+parseFloat(two);
avSelect.form.avvy.value=avvy;

var three=avSelect.form.three.value;
var four=avSelect.form.four.value;
var avvy1=parseFloat(three)+parseFloat(four);
avSelect.form.avvy1.value=avvy1;

var five=avSelect.form.five.value;
var six=avSelect.form.six.value;
var avvy2=parseFloat(five)+parseFloat(six);
avSelect.form.avvy2.value=avvy2;

var seven=avSelect.form.seven.value;
var eight=avSelect.form.eight.value;
var avvy3=parseFloat(seven)+parseFloat(eight);
avSelect.form.avvy3.value=avvy3;

var nine=avSelect.form.nine.value;
var ten=avSelect.form.ten.value;
var avvy4=parseFloat(nine)+parseFloat(ten);
avSelect.form.avvy4.value=avvy4;

var leven=avSelect.form.leven.value;
var twel=avSelect.form.twel.value;
var avvy5=parseFloat(leven)+parseFloat(twel);
avSelect.form.avvy5.value=avvy5;

var thirteen=avSelect.form.thirteen.value;
var fourteen=avSelect.form.fourteen.value;
var avvy6=parseFloat(thirteen)+parseFloat(fourteen);
avSelect.form.avvy6.value=avvy6;

var fifteen=avSelect.form.fifteen.value;
var sixteen=avSelect.form.sixteen.value;
var avvy7=parseFloat(fifteen)+parseFloat(sixteen);
avSelect.form.avvy7.value=avvy7;

var tot0=parseFloat(one)+parseInt(five)+parseFloat(nine)+parseFloat(thirteen);
avSelect.form.t0.value=tot0;

var tot1=parseFloat(two)+parseInt(six)+parseFloat(ten)+parseFloat(fourteen);
avSelect.form.t1.value=tot1;

var tot2=parseFloat(avvy)+parseFloat(avvy2)+parseFloat(avvy4)+parseFloat(avvy6);
avSelect.form.t2.value=tot2;

var tot3=parseFloat(three)+parseFloat(seven)+parseFloat(leven)+parseFloat(fifteen);
avSelect.form.t3.value=tot3;

var tot4=parseFloat(four)+parseFloat(eight)+parseFloat(twel)+parseFloat(sixteen);
avSelect.form.t4.value=tot4;

var tot5=parseFloat(avvy1)+parseFloat(avvy3)+parseFloat(avvy5)+parseFloat(avvy7);
avSelect.form.t5.value=tot5;
}
</script>
@stop
