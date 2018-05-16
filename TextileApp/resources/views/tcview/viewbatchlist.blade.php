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
        @if(Session::has('success'))
        <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('success') !!}</em></div>
        @endif
        <h1 style="color: #b30000;">List Of Batches</h1>
        <table class="table table-bordered">
        <tr><th>Batch Id</th><th>Batch Name</th><th>Batch Type</th><th>Start Date</th><th>End Date</th><th>No Of Candidate</th><th>Status</th><th>Candidate Upload</th><th>Update/Delete</th></tr>
            @foreach($batchinfo as $row)
            <tr>
                <td>{{$row->batch_id}}</td><td>{{$row->batch_name}}</td><td>{{$row->training_type}}</td><td>{{$row->start_date}}</td><td>{{$row->end_date}}</td><td>{{$row->no_of_stud}}</td><td>{{$row->status}}</td>  
                <td>
                <form id="uploadform.{{$row->batch_id}}"  action="{{ url('importExcel/'.$row->batch_id) }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <span style="float:left;margin-top: 4%;"><input type="file" name="import_file" /></span><br>
                <span style="float:right;margin-top: -10%;"><button class="btn btn-primary">Import</button></span>
                </form>
                </td>
                <td>
                     <form id="editform.{{$row->batch_id}}" action="{{ url('batch/'.$row->batch_id) }}" method="POST">
                    {{ csrf_field() }}<a onclick="document.getElementById('editform.{{$row->batch_id}}').submit();"><i class="glyphicon glyphicon-edit" id="edit"></i></a></form>
                    <form id="deleteform.{{$row->batch_id}}" action="{{ url('deletebatchlist/'.$row->batch_id) }}" method="POST">
                    {{ csrf_field() }}<a onclick="document.getElementById('deleteform.{{$row->batch_id}}').submit();"><i class="glyphicon glyphicon-trash"></i></a></form>
                </td>         
            </tr>
            @endforeach
        </table>
        </div>
</div>   
@stop
