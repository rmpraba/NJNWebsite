
@extends('layouts.sidebar')
@section('content')
<style type="text/css">
    #viewbatchcontainer{
        margin-top: 5%;
        margin-bottom: 2%;
    }
    #edit{
        width:40px;
        height:40px;
        float:left;
    }
</style>
 <div class="row" id="viewbatchcontainer">
        <!-- sidebar content -->
        <div id="sidebar" class="col-md-3">
            @include('includes.tdsidebar')
        </div>
        <!-- main content -->
        <div id="viewtargetcontent" class="col-md-9">
        <h1 style="color: #b30000;">Training Centre List</h1>
        <table class="table table-bordered">
        <tr>
<<<<<<< HEAD
            <th>ID</th><th>Owner Name</th><th>Center ID</th><th>District ID</th><th>Upload Picture</th><th>street</th><th>district</th><th>state</th><th>PIN Code</th><th>Email</th><th>Mobile number</th><th>landline</th><th>website_id</th><th>PAN Card</th><th>PAN image</th><th>GST</th><th>GST Image</th><th>Training_start</th><th>Adhar Card</th><th>Adhar Image</th><th>Center Type</th><th>Training Sub</th><th>Center Status</th><th>Created On</th><th>Updated On</th><th>Edit & delete</th>
=======
            <th>ID</th><th>Owner Name</th><th>Center ID</th><th>District ID</th><th>Upload Picture</th><th>street</th><th>district</th><th>state</th><th>PIN Code</th><th>Email</th><th>Mobile number</th><th>landline</th><th>website_id</th><th>PAN Card</th><th>PAN image</th><th>GST</th><th>GST Image</th><th>Training_start</th><th>Training end</th><th>Adhar Card</th><th>Adhar Image</th><th>Center Type</th><th>Training Sub</th><th>Center Status</th><th>Created On</th><th>Updated On</th><th>Update/Delete</th>
>>>>>>> 2eee5adb037d70d62088938d3052d6b26966484f
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
                <td>{{$row->adhar_card}}</td>
                <td>{{$row->adhar_card_image}}</td>
                <td>{{$row->centre_type}}</td>
                <td>{{$row->training}}</td>
                <td>{{$row->centre_status}}</td>
                <td>{{$row->created_at}}</td>
                <td>{{$row->updated_at}}</td>
<<<<<<< HEAD
                <td>
                     <i id="edit" class="glyphicon glyphicon-edit"></i>
                    <form id="deleteform.{{$row->centre_id}}" action="{{ url('deletetcview/'.$row->centre_id) }}" method="POST">
                    {{ csrf_field() }}
                    <a onclick="document.getElementById('deleteform.{{$row->centre_id}}').submit();"><i class="glyphicon glyphicon-trash"></i></a></form>
                    



                    
                </td>                     
=======
                <td></td>
                <td>
                    <i id="edit" class="glyphicon glyphicon-edit"></i>
                    
                    <form id="deleteform.{{$row->centre_id}}" action="{{ url('deletetcview/'.$row->centre_id) }}" method="POST">
                    {{ csrf_field() }}<a onclick="document.getElementById('deleteform.{{$row->centre_id}}').submit();"><i class="glyphicon glyphicon-trash"></i></a></form>
                    
                </td>           
>>>>>>> 2eee5adb037d70d62088938d3052d6b26966484f
            </tr>
            @endforeach
        </table>
        </div>
</div>   
@stop
