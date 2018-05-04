
@extends('layouts.sidebar')

@section('content')
<style type="text/css">
  .star{
    color:red;
    text-align: center;
    font-size: 20px;
   padding-top: 174%;
   padding-bottom: -30%;
  }
  .star1{
    padding-top: 350%;
    padding-bottom: -30%;
    color:red;
    text-align: center;
    font-size: 20px;
  }
  .dd{
    padding-left: 70%;
  }
</style>
 <div class="row"> 
    <div class="col-md-4">
         @include('includes.tdsidebar')
    </div>
     <div class="col-md-8">
        <table>
      
              <form action="" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <tr>
          <td colspan="4">
              <label class="dd" align="right">District &nbsp :<?php echo "$district";?></label><br>
              <label class="dd" align="right">Division :<?php echo "$div";?></label>
          </td>
          
        </tr>  
        <tr>
          <td colspan="3">
              <label for="usr">Training centre name </label>
              <input type="text" class="form-control" id="usr" name="centre_name" required>
          </td>
          <td><p class="star1">&nbsp*</p></td>    
        </tr> 
        
        <tr>
          <td>     
              <label for="sel1">Owner name </label>
              <input type="text" class="form-control" id="sel1" name="name" required>
          </td><td><p class="star">&nbsp*&nbsp&nbsp</p></td>
          <td >
              <label for="usr">Upload Picture</label>
              <input type="file" class="form-control" id="usr">
          </td><td>&nbsp</td>
        </tr>
        <tr>
          <td>
              <label for="usr">Street</label>
              <input type="text" class="form-control" id="usr" name="street" placeholder="Bulding No,Street,PO,TK" required>
          </td><td><p class="star">*</p></td>
          <td> 	 
              <label for="usr">District</label>
              <select class="form-control" id="sel1" name="district" required>
              <option value="" disabled selected>Select your District</option>
              @foreach ($districts as $district)
              <option>{{ $district->district_name}}</option>
              @endforeach
              </select>
          </td><td><p class="star1">*</p></td>
        </tr>
        <tr>
          <td> 	  
          		<label for="usr">State</label>
        			<select class="form-control" id="sel1" name="state" required>
              <option value="" disabled selected>Select your State</option>
              @foreach ($states as $state)
              <option>{{ $state->state_names}}</option>
              @endforeach
              </select><td><p class="star">*</p></td>
         </td>
         <td>    	 
          		<label for="usr">PIN</label>
        			<input type="number" class="form-control" id="usr" name="pin" required>
         </td><td><p class="star1">*</p></td>
       </tr>
       <tr>
         <td>
              <label for="usr">Email ID</label>
          		<input type="email" class="form-control" id="usr" name="email" required>
         </td><td><p class="star">*</p></td>
         <td>  
            	<label for="usr">Moblie number</label>
          		<input type="number" class="form-control" id="usr"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number"maxlength = "10" name="mobile" required>
         </td><td><p class="star1">*</p></td>
        </tr>
        <tr>
          <td>
          		<label for="usr">Landline Number</label>
        			<input type="text" class="form-control" id="usr" name="landline">
          </td><td>&nbsp</td>
          <td >	  
          		<label for="usr">Website ID</label>
        			<input type="text" class="form-control" id="usr" name="websiteid">
          </td><td>&nbsp</td>
        </tr>
        <tr>
          <td>       	 
          		<label for="usr">PAN Card</label>
        			<input type="text" class="form-control" id="usr" name="pancard" required>
          </td><td><p class="star">*</p></td>
          <td >  	 
            	<label for="usr">PAN Card image upload..</label>
          		<input type="file" class="form-control" id="usr">
          </td><td>&nbsp</td>
        </tr>
        <tr>
          <td> 	 
            	<label for="usr">GST</label>
          		<input type="text" class="form-control" id="usr" name="gst" required>
          </td><td><p class="star">*</p></td>
          <td> 	 
            	<label for="usr">GST image upload..</label>
          		<input type="file" class="form-control" id="usr">
          </td><td>&nbsp</td>
        </tr>
        <tr>
          <td>        	 
            	<label for="usr">Training centre started on</label>
          		<input type="date" class="form-control" id="usr" name="trainingstart" required>
          </td><td><p class="star">*</p></td>
          <td>  	  
            	<label for="usr">Aadhar Card</label>
          		<input type="text" class="form-control" id="usr" name="adhar" required>
          </td><td><p class="star1">*</p></td>  	 
        </tr>
        <tr>
          <td>
            	<label for="usr">Aadhar card image upload</label>
          		<input type="file" class="form-control" id="usr">
          </td><td>&nbsp</td>
          <td>  	 
            	<label for="usr">Type of centre</label>
          		<select class="form-control" id="sel1" name="centre" required>
              <option value="" disabled selected>Select centre type</option>
      		    @foreach ($tocs as $t)
              <option>{{ $t->types }}</option>
              @endforeach
      		    </select>
          </td><td><p class="star1">*</p></td>
        </tr>
        <tr>
          <td>    	  
              <label for="usr">Training subject</label>
              <select class="form-control" id="sel1" name="training">
              <option value="" disabled selected>Select subject</option>
              @foreach ($subjects as $t)
              <option>{{ $t->subjects }}</option>
              @endforeach
              </select>            		
          </td><td><p class="star">*</p></td>
          <td>  	 
              <label for="usr"></label>
              <input align="right" type="submit" class="btn btn-primary btn-block" id="usr">
          </td><td>&nbsp</td>
        </tr>      
          </form>
      </table>
</div>
</div>

@stop

