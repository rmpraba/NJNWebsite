
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
<div class="row" >
<div class="col-sm-5" style="margin-left:4%;">
              <label for="usr">Academic Year</label>
              <select class="form-control" id="sel1" name="fiscalyear" required>
              <option value="">-----Select Academic Year-----</option>
              @foreach ($academicyear as $key )
              <option value="{{ $key->academic_year }}"  {{( $key->academic_year == $acyear ) ? 'selected' : ''}} >{{ $key->academic_year }}</option>
              @endforeach
              </select>
</div>
<div class="col-sm-5" style=" margin-left:5%;margin-top: 4%;">
              <label for="usr">Training Center: </label>
              <label for="usr"><span data-field="tc" id="tc" name="tc">{{$tc}}</span></label>
 </div>
</div>
<h1 style="color: #b30000;">Report</h1>
<div class="response" id="view">
<table class="table table-bordered">
  <tr><th>Centre Id</th><th>Centre Name</th><th>District</th><th>Batch Id</th><th>Batch Name</th><th>Training Subject</th><th colspan="3">Physical Target</th><th colspan="3">Financial Target</th></tr>
  <tr><th></th><th></th><th></th><th></th><th></th><th></th><th>Male Total</th><th>Female Total</th><th>Total</th><th>Male Total</th><th>Female Total</th><th>Total</th></tr>
  @foreach ($physicalinfo as $p)
  <tr><td>{{ $p->centre_id }}</td><td>{{ $p->centre_name }}</td><td>{{ $p->district }}</td><td>{{ $p->batch_id }}</td><td>{{ $p->batch_name }}</td><td>{{ $p->batch_type }}</td><td>{{ $p-> phy_male }}</td><td>{{ $p-> phy_female }}</td><td>{{ $p-> phy_total }}</td><td>{{ $p->fin_male }}</td><td>{{ $p->fin_female }}</td><td>{{ $p->fin_total }}</td></tr>
  @endforeach
</table>
</div>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="fiscalyear"]').on('change', function() {
            var fiscalyear = $(this).val();
            var tc=$("[data-field='tc']").text();
            if(tc) {
              var row = '<table class="table table-bordered"><tr><th>Centre ID</th><th>Centre Name</th><th>District</th><th>Batch Id</th><th>Batch Name</th><th>Training Type</th><th colspan="3">Physical Target</th><th colspan="3">Financial Target</th></tr><tr><th></th><th></th><th></th><th></th><th></th><th></th><th>Male Total</th><th>Female Total</th><th>Total</th><th>Male Total</th><th>Female Total</th><th>Total</th></tr>';
                $.ajax({
                    url: '/pfreport/'+tc+'/'+fiscalyear,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {    
                    // alert(JSON.stringify(data));                   
                      $.each(data, function (i, item) {
                        // alert(data[i].centre_id);
                    row += '<tr><td>' + data[i].centre_id + '</td><td>' + data[i].centre_name + '</td><td>' + data[i].district + '</td><td>' + data[i].batch_id + '</<td><td>' + data[i].batch_name + '</td><td>' + data[i].batch_type + '</td><td>' + data[i].phy_male + '</td><td>'+ data[i].phy_female + '</td><td>'+ data[i].phy_total + '</td><td>' + data[i].fin_male + '</td><td>'+ data[i].fin_female + '</td><td>'+ data[i].fin_total +'</td></tr>';
                });
                      row+='</table>';
                      // alert(row);
                $('div.response').html('');
                $('#view').append(row);
                
                    }

                });
                
            }
            else{                
            }
        });
    });
  </script>
@stop
