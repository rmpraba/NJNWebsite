
@extends('layouts.sidebar')

@section('content')


  <div style="width:20%;height: 100px;float: left;">
   @include('includes.tdsidebar')
  </div>
  <div style="width:75%;float:left;overflow:auto;">
          <center><h2 style="color:red;">Training centre</h2></center>
          <form action="" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
            		  <div style="float:left;width: 45%;" class="form-group">
              	  </div>
              	  <div style="float:left;width: 10%;margin-left: 35%" class="form-group">
              		&nbsp&nbsp&nbsp<label align="right">Distric:XXXX</label><br>
            			&nbsp&nbsp&nbsp<label align="right">Division:YYYY</label>
            		  </div>
                <div class="form-group">
                <label for="sel1">Training centre name :</label>
                <input type="text" class="form-control" id="sel1" name="centre_name" required>
                <!-- <select class="form-control" id="sel1" name="centre_name">
                <option>name one</option>
                <option>name two</option>
                <option>name three</option>
                <option>name four</option>
                </select> -->
                </div>
                  <div style="float:left;width: 45%;" class="form-group">
              		<label for="usr">Owner name</label>
            			<input type="text" class="form-control" id="usr" name="name" required> 
              	  </div>
              	  <div style="float:left;width: 45%;margin-left: 10%" class="form-group">
              		<label for="usr">Upload Picture</label>
            			<input type="file" class="form-control" id="usr">
              	  </div>
            	  <div style="float:left;width: 45%;" class="form-group">
            		<label for="usr">Address Line1</label>
          			<input type="text" class="form-control" id="usr" required>
            	  </div>
            	  <div style="float:left;width: 45%;margin-left: 10%" class="form-group">
            		<label for="usr">Address Line2</label>
          			<input type="text" class="form-control" id="usr" required>
            	  </div>
              	  <div style="float:left;width: 45%;" class="form-group">
              		<label for="usr">Address Line3</label>
            			<input type="text" class="form-control" id="usr" required>
              	  </div>
              	  <div style="float:left;width: 45%;margin-left: 10%" class="form-group">
              		<label for="usr">Address Line4</label>
            			<input type="text" class="form-control" id="usr" required>
              	  </div>
            	  <div style="float:left;width: 45%;" class="form-group">
            		<label for="usr">Email ID</label>
          			<input type="Email" class="form-control" id="usr" name="email" required>
            	  </div>
            	  <div style="float:left;width: 45%;margin-left: 10%" class="form-group">
            		<label for="usr">Moblie number</label>
          			<input type="text" class="form-control" id="usr" name="mobile" required>
            	  </div>
              	  <div style="float:left;width: 45%;" class="form-group">
              		<label for="usr">Landline Number</label>
            			<input type="text" class="form-control" id="usr" name="landline" required>
              	  </div> 
              	  <div style="float:left;width: 45%;margin-left: 10%" class="form-group">
              		<label for="usr">Website ID</label>
            			<input type="text" class="form-control" id="usr" name="websiteid" required>
              	  </div>
            	  <div style="float:left;width: 45%;" class="form-group">
            		<label for="usr">PAN Card</label>
          			<input type="text" class="form-control" id="usr" name="pancard" required>
            	  </div> 
            	  <div style="float:left;width: 45%;margin-left: 10%" class="form-group">
            	 	<label for="usr">PAN Card image upload..</label>
          			<input type="file" class="form-control" id="usr">
            	  </div>
              	  <div style="float:left;width: 45%;" class="form-group">
              		<label for="usr">GST</label>
            			<input type="text" class="form-control" id="usr" name="gst" required>
              	  </div> 
              	  <div style="float:left;width: 45%;margin-left: 10%" class="form-group">
              		<label for="usr">GST image upload..</label>
            			<input type="file" class="form-control" id="usr" >
              	  </div>
            	  <div style="float:left;width: 45%;" class="form-group">
            		<label for="usr">Training centre started on</label>
          			<input type="date" class="form-control" id="usr" name="trainingstart" required>
            	  </div> 
            	  <div style="float:left;width: 45%;margin-left: 10%" class="form-group">
            		<label for="usr">Aadhar Card</label>
          			<input type="text" class="form-control" id="usr" name="adhar" required>
            	  </div>
              	  <div style="float:left;width: 45%;" class="form-group">
              		<label for="usr">Aadhar card image upload</label>
            			<input type="file" class="form-control" id="usr">
              	  </div> 
              	  <div style="float:left;width: 45%;margin-left: 10%" class="form-group">
              		<label for="usr">Type of centre</label>
              		<select class="form-control" id="sel1" name="centre" required>
                  <option>-----Select-----</option>
          		    <option>Govt Training Centre</option>
          		    <option>Public Training Centre</option>
          		    <option>Private Training Centre</option>
          		    <option>Network Training Centre</option>
          		    </select>
              	  </div>
            	  <div style="float:left;width: 45%;" class="form-group">
            		<label for="usr">Status</label>
                <input type="text" class="form-control" id="usr" name="status" value="active">
            		<!-- <select class="form-control" id="sel1" name="status">
        		    <option>type one</option>
        		    <option>type two</option>
        		    <option>type three</option>
        		    <option>type four</option>
        		    </select> -->
            	  </div>
              	  <div style="float:left;width: 45%;margin-left: 10%" class="form-group">
              		<label for="usr">Training subject</label>
              		<select class="form-control" id="sel1" name="training">
                  <option>-----Select-----</option>
          		    <option>Weaving</option>
          		    <option>Sewing</option>
          		    <option>Dyeing</option>
          		    <option>Clothing</option>
          		    </select>
              	  </div>
            	  <div style="float:left;width: 45%;" class="form-group">
            	  </div>
            	  <div style="float:left;width: 45%;margin-left: 10%" class="form-group">
            		<label for="usr"></label>
          			<input align="right" type="submit" class="btn btn-primary btn-block" id="usr">
            	  </div>
          </form>
    </div>

@stop

