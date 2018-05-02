
@extends('layouts.sidebar')
@section('content')
<style type="text/css">
    #viewbatchlistcontainer{
        margin-top: 5%;
        margin-bottom: 2%;
    }
</style>
 <div class="row" id="viewbatchlistcontainer">
        <!-- sidebar content -->
        <div id="sidebar" class="col-md-3">
            @include('includes.sidebar')
        </div>
        <!-- main content -->
        <div id="viewtargetcontent" class="col-md-9">
        <h1 style="color: #b30000;">List Of Batches</h1>
        <table class="table table-bordered">
        <tr><th>Batch Id</th><th>Batch Name</th><th>Batch Type</th><th>Start Date</th><th>End Date</th><th>No Of Candidate</th><th>Status</th></tr>
            @foreach($batchinfo as $row)
            <tr>
                <td>{{$row->batch_id}}</td><td>{{$row->batch_name}}</td><td>{{$row->training_type}}</td><td>{{$row->start_date}}</td><td>{{$row->end_date}}</td><td>{{$row->no_of_stud}}</td><td>{{$row->status}}</td>           
            </tr>
            @endforeach
        </table>
        </div>
</div>   
@stop
