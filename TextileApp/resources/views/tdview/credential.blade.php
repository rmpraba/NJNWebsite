<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
@extends('layouts.sidebar')
@section('content')

 <div class="row" id="targetcontainer">
        <!-- sidebar content -->
        <div id="sidebar" class="col-md-3">
            @include('includes.tdsidebar')
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
<div id="view"></div>
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
                         var row = '<table border="1"><tr><th>Centre ID</th><th>Centre Name</th><th>Owner Name</th><th>District</th><th>Type of centre</th><th>Subject</th><th>User name</th><th>Password</th><th>Save</th></tr>';
                $.each(data, function (i, item) {
                    row += '<tr><td>' + item.centre_id + '</td><td>' + item.centre_name + '</td><td>'+item.name+'</td><td>'+item.district+'</td><td>'+item.centre_type+'</td><td>'+item.training+'</td><td><input type="text"></td><td><input type="text"></td><td><button class="btn btn-xs btn-danger deleteTest"  data-toggle="modal" data-target="#myModal" data-id="' + item.centre_id + '">Save</button></td></tr>';

                });
                row+='</table>';
                $('#view').html('');
                $('#view').append(row);
                    }
                });
            }else{
            }
        });
        $(document).on('click', '.deleteTest', function () {
            var id = $(this).attr('data-id');
            alert(id);
            var Delete = $(this).parent().parent();
            $.ajax({
                url: 'test/' + id,
                type: "DELETE",
                data: id,
                dataType: "json",
                success: function (data, textStatus, jqXHR) {
                    Delete.remove();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(textStatus);
                }
            });
        });
        });
</script>
@stop
