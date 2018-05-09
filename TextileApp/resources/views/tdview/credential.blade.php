<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
@extends('layouts.sidebar')
@section('content')

 <div class="row" id="targetcontainer">
        <!-- sidebar content -->
        <div id="sidebar" class="col-md-3">
            @include('includes.sidebar')
        </div>
        <!-- main content -->
        <div id="targetcontent" class="col-md-9">
    <h1 style="color: #b30000;"> Credential </h1>
    <table>
    <tr><td>
    <div class="form-group">
        <label>Financial Year:</label><br>
        <select class="form-control" id="sel1" name="fiscalyear" required>
        <option value="">-----Select Academic Year-----</option>
        <option value="2018-2019">2018-2019</option>
        <option value="2019-2020">2019-2020</option>
        </select>
    </div>
    </td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td>
        <div class="form-group">   
              <label for="usr">District:</label><br>
              <select class="form-control" id="sel1" name="district" required>
              <option value="" disabled selected>Select your District</option>
              @foreach ($districts as $district)
              <option value="{{ $district->district_code }}">{{ $district->district_name}}</option>
              @endforeach
              </select>
        </div>
    </td>
    </tr>   
</table> <br><br>

<table class="table table-bordered">
        <tr>
            <th>Centre&nbspID</th>
            <th>Centre&nbspName</th>
            <th>Owner&nbspName</th>
            <th>District</th>
            <th>Type&nbspof&nbspcentre</th>
            <th>Subject</th>
            <th>Save</th>
        </tr>

    </table>

</div>
</div>    
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="district"]').on('change', function() {
            var district = $(this).val();
            if(district) {
                $.ajax({
                    url: '/fetchdistrictwisetc/ajax/'+district,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {                       
                        
                    }
                });
            }else{
                // $('select[name="batch"]').empty();
            }
        });
        });
</script>
@stop
