
@extends('layouts.sidebar')

@section('content')


  <div style="width:20%;height: 100px;float: left;">
   @include('includes.tdsidebar')
  </div>
  <div style="width:70%;margin-left:8%; float:left;overflow:auto;">
          <center><h2 style="color:red;">Training centre</h2></center>
          <!-- heading -->
          <form action="" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div style="float:left;width: 45%;" class="form-group">
                </div>
                <div style="float:left;width: 10%;margin-left: 35%" class="form-group">
                <label align="right">Distric:XXXX</label><br>
                <label align="right">Division:YYYY</label>
                </div>
                <!-- name of the owener -->
                <div class="form-group">
                <label for="usr">Training centre name </label>
                <input type="text" class="form-control" id="usr" name="centre_name" required>
                </div>
                <!-- name of the trining center -->
                <div style="float:left;width: 45%;" class="form-group">
                <label for="sel1">Owner name </label>
                <input type="text" class="form-control" id="sel1" name="name" required>
                  	  </div>
                  	  <div style="float:left;width: 45%;margin-left: 10%" class="form-group">
                  		<label for="usr">Upload Picture</label>
                			<input type="file" class="form-control" id="usr">
                  	  </div>
                <!--  -->
            	  <div style="float:left;width: 45%;" class="form-group">
            		<label for="usr">Street</label>
          			<input type="text" class="form-control" id="usr" name="street" placeholder="Bulding No,Street,PO,TK" required>
            	  </div>
            	  <div style="float:left;width: 45%;margin-left: 10%" class="form-group">
            		<label for="usr">District</label>
                <select class="form-control" id="sel1" name="district" required>
                <option value="" disabled selected>Select your District</option>
                <option>District1</option>
                <option>District2</option>
                <option>District3</option>
                <option>District4</option>
                </select>
            	  </div>

                  	  <div style="float:left;width: 45%;" class="form-group">
                  		<label for="usr">State</label>
                			<select class="form-control" id="sel1" name="state" required>
                      <option value="" disabled selected>Select your State</option>
                      <option>State1</option>
                      <option>State2</option>
                      <option>State3</option>
                      <option>State4</option>
                      </select>
                  	  </div>
                  	  <div style="float:left;width: 45%;margin-left: 10%" class="form-group">
                  		<label for="usr">PIN</label>
                			<input type="text" class="form-control" id="usr" name="pin" required>
                  	  </div>
            	  <div style="float:left;width: 45%;" class="form-group">
            		<label for="usr">Email ID</label>
          			<input type="email" class="form-control" id="usr" name="email" required>
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
                			<input type="url" class="form-control" id="usr" name="websiteid" required>
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
                			<input type="file" class="form-control" id="usr">
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
                      <option value="" disabled selected>Select centre type</option>
              		    <option>type one</option>
              		    <option>type two</option>
              		    <option>type three</option>
              		    <option>type four</option>
              		    </select>
                  	  </div>

            	  <div style="float:left;width: 45%;" class="form-group">
            		<label for="usr">Status</label>
            		<select class="form-control" id="sel1" name="status" required>
        		    <option value="" disabled selected>Select status</option>
        		    <option>inactive</option>
        		    <option>active</option>
        		    </select>
            	  </div>
                <div style="float:left;width: 45%;margin-left: 10%" class="form-group">
                <label for="usr">Training subject</label>
                <select class="form-control" id="sel1" name="training">
                <option value="" disabled selected>Select subject</option>
              	<option>subject one</option>
              	<option>subject two</option>
              	<option>subject three</option>
              	<option>subject four</option>
              	</select>
                </div>

                    	<div style="float:left;width: 45%;" class="form-group">
                      <label for="usr">Training centre end on</label>
                     <input type="date" class="form-control" id="usr" name="trainingend" required>
                    	</div>
                    	<div style="float:left;width: 45%;margin-left: 10%" class="form-group">
                    	<label for="usr"></label>
                  		<input align="right" type="submit" class="btn btn-primary btn-block" id="usr">
                    	</div>

          </form>
    </div>

@stop

