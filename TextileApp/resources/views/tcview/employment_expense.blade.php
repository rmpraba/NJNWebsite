<!-- <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script> -->
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
    #targetcontainer{
        margin-top: 5%;
        margin-bottom: 2%;
    }
</style>
 <div class="row" id="targetcontainer">
        <!-- sidebar content -->
        <div id="sidebar" class="col-md-3">
            @include('includes.sidebar')
        </div>
        <!-- main content -->
        <div id="targetcontent" class="col-md-9">
    <center><h1 style="color: #b30000;"> Employment Status and Expenses </h1></center>
    <form action="/insertpftarget" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="districtcode" hidden>
    <!-- <span data-field="districtcode" id="districtcode" name="districtcode" hidden></span> -->
    <table style="width: 100%;">
    <tr>
        <td ></td><td>&nbsp&nbsp&nbsp&nbsp</td><th style="text-align: right;">District:<span data-field="district" id="district" name="district">Kolar</span>
        <br>Division:<span data-field="division" id="division" name="division">Kolar</span></th>
    </tr>
    <tr><td>&nbsp</td><td>&nbsp&nbsp&nbsp&nbsp</td><td>&nbsp</td></tr>
    <tr>
    <td>
    <div class="form-group">
        <label>Financial Year:</label><br>
        <select class="form-control" id="sel1" name="fiscalyear" required>
        <option value="">-----Select Academic Year-----</option>
        <option value="2018-2019" selected="selected">2018-2019</option>
        <option value="2019-2020" >2019-2020</option>
        </select>
    </div>
    </td><td></td>
    <td>
        <div class="form-group">
                <label>Select Training Centre:</label><br>
                <select name="tc" class="form-control" style="width:350px" required>
                    <option value="" selected>Kolar Center</option>
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
                <option value="">Batch-A</option> 
                <option value="">Batch-B</option> 
                <option value="">Batch-C</option> 
                <option value="">Batch-D</option> 
                </select>
            </div>
        </td>
        <td></td>
        
    </tr>
       
</table>
<div><h2>Candidate List :-</h2><br></div>
<table class="table table-bordered" >
   <tr>
    <th>SI No</th>
    <th>Name</th>
     <th>Employed</th>
    <th>Gender</th>
    <th>Category</th>
    <th>Industry Type</th>
  </tr>
  @for($i=1;$i<=10;$i++)
  <tr>
    <td>{{ $i }}</td>
    <td><?php
$names = array(
    'Christopher',
    'Ryan',
    'Ethan',
    'John',
    'Zoey',
    'Sarah',
    'Michelle',
    'Samantha',
);
 
//PHP array containing surnames.
$surnames = array(
    'Walker',
    'Thompson',
    'Anderson',
    'Johnson',
    'Tremblay',
    'Peltier',
    'Cunningham',
    'Simpson',
    'Mercado',
    'Sellers'
);
 

     $random_name = $names[mt_rand(0, sizeof($names) - 1)];
 
//Generate a random surname.
$random_surname = $surnames[mt_rand(0, sizeof($surnames) - 1)];
 
//Combine them together and print out the result.
echo $random_name . ' ' . $random_surname; ?></td>
    <td><input type="radio" name="gender1" value="male" checked> Yes<br>
  <input type="radio" name="gender2" value="female"> No<br></td>
  <td><span>Male</span><br>
    <td><span>SCP</span></td>

  <td>

       <select>
  <option value="volvo">Industries</option>
  <option value="saab">Own</option>
  <option value="mercedes">Group Activity</option>
  <option value="audi">Others</option>
</select> 
  </td>
  </tr>
  @endfor

</table>
 
 <br> <div ><span><b>Employement Expense:</b></span><input type="number" name="firstname"  style="margin-left: 150px;"></div><br>
<button type="submit" class="btn btn-primary" style="margin-left: 70%;width: 30%;">Submit</button>
</form>
</div>
</div>    

@stop
