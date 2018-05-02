
@extends('layouts.sidebar')
@section('content')
<style type="text/css">
    #viewbatchcontainer{
        margin-top: 5%;
        margin-bottom: 2%;
    }
</style>
 <div class="row" id="viewbatchcontainer">
        <!-- sidebar content -->
        <div id="sidebar" class="col-md-3">
            @include('includes.tdsidebar')
        </div>
        <!-- main content -->
        <div id="viewtargetcontent" class="col-md-9">
        <h1 style="color: #b30000;">Batch Approval</h1>
        <table class="table table-bordered">
        <tr>
            <th>ID</th><th>Owner Name</th><th>Center ID</th><th>District ID</th><th>Upload Picture</th><th>street</th><th>district</th><th>state</th><th>PIN Code</th><th>Email</th><th>Mobile number</th><th>landline</th><th>website_id</th><th>PAN Card</th><th>PAN image</th><th>GST</th><th>GST Image</th><th>Training_start</th><th>Training end</th><th>Adhar Card</th><th>Adhar Image</th><th>Center Type</th><th>Training Sub</th><th>Center Status</th><th>Created On</th><th>Updated On</th>
        </tr>
            @foreach($tcinfo as $row)
            <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->centre_id}}</td>
                <td>{{$row->district_id}}</td>
                <td>{{$row->upload_pic}}</td>
                <td>{{$row->street}}</td>
                <td>{{$row->district}}</td>
                <td>{{$row->state}}</td>
                <td>{{$row->pin_code}}</td>
                <td>{{$row->email}}</td>
                <td>{{$row->mobile_number}}</td>
                <td>{{$row->landline}}</td>
                <td>{{$row->website_id}}</td>
                <td>{{$row->pan_card}}</td>
                <td>{{$row->pan_card_image}}</td>
                <td>{{$row->gst}}</td>
                <td>{{$row->gst_image}}</td>
                <td>{{$row->training_start}}</td>
                <td>{{$row->training_end}}</td>
                <td>{{$row->adhar_card}}</td>
                <td>{{$row->adhar_card_image}}</td>
                <td>{{$row->training}}</td>
                <td>{{$row->centre_status}}</td>
                <td>{{$row->created_at}}</td>
                <td>{{$row->updated_at}}</td>
                             
            </tr>
            @endforeach
        </table>
        </div>
</div>   
@stop
