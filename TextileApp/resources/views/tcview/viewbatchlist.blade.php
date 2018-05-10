<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
@extends('layouts.sidebar')
@section('content')

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <div class="row" id="viewbatchlistcontainer">
        <!-- sidebar content -->
        <div id="sidebar" class="col-md-3">
            @include('includes.sidebar')
        </div>
        <!-- main content -->
        <div id="viewtargetcontent" class="col-md-9">
        <h1 style="color: #b30000;">List Of Batches</h1>
        @if(session()->has('message'))
           
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ session()->get('message') }}
              </div>
        @endif
        <table class="table table-bordered">
        <tr><th>Batch Id</th><th>Batch Name</th><th>Batch Type</th><th>Start Date</th><th>End Date</th><th>No Of Candidate</th><th>Status</th><th>Update/Delete</th><th>Action</th></tr>
        <?php 

        //echo "<pre>";print_r($batchinfo); ?>
            @foreach($batchinfo as $row)
            <tr>
                <td>{{$row->batch_id}}</td><td>{{$row->batch_name}}</td><td>{{$row->training_type}}</td><td>{{$row->start_date}}</td><td>{{$row->end_date}}</td><td>{{$row->no_of_stud}}</td><td>{{$row->status}}</td>  
                <td>
                     <form id="editform.{{$row->batch_id}}" action="{{ url('batch/'.$row->batch_id) }}" method="POST">
                    {{ csrf_field() }}<a onclick="document.getElementById('editform.{{$row->batch_id}}').submit();"><i class="glyphicon glyphicon-edit" id="edit"></i></a></form>
                    <form id="deleteform.{{$row->batch_id}}" action="{{ url('deletebatchlist/'.$row->batch_id) }}" method="POST">
                    {{ csrf_field() }}<a onclick="document.getElementById('deleteform.{{$row->batch_id}}').submit();"><i class="glyphicon glyphicon-trash"></i></a></form>
                </td>
                <td>
                    @if($row->status == "Approved" && $row->action != "Completed" && $row->action != "Start")
                        <form id="actionstartform.{{$row->batch_id}}" action="{{ url('batchAction/'.$row->batch_id.'/Start') }}" method="POST">
                    {{ csrf_field() }}<a onclick="document.getElementById('actionstartform.{{$row->batch_id}}').submit();" class="btn btn-primary batchbtn" href="#"><span text-primary"></span>Start</a><br><br></form>
                    @else
                         <a disabled class="btn btn-primary batchbtn" href="#"><span text-primary"></span>Start</a><br><br>
                    @endif

                    @if($row->status == "Approved")
                    <form id="actionholdform.{{$row->batch_id}}" action="{{ url('batchAction/'.$row->batch_id.'/Hold') }}" method="POST">
                    {{ csrf_field() }}
                        <a onclick="document.getElementById('actionholdform.{{$row->batch_id}}').submit();" class="btn btn-warning batchbtn" href="#"><span text-primary"></span>Hold</a><br><br></form>
                    @else
                        <a disabled class="btn btn-warning batchbtn" href="#"><span text-primary"></span>Hold</a><br><br>
                    @endif

                    @if($row->status == "Approved" && ($row->action == "Start" || $row->action == "Hold"))
                        <a  class="btn btn-success batchbtn" href="#"><span text-primary"></span>Completed</a>
                    @else
                        <a  disabled class="btn btn-success batchbtn" href="#"><span text-primary"></span>Completed</a>
                    @endif
                </td>         
            </tr>
            @endforeach
        </table>
        </div>
</div>   
@stop
