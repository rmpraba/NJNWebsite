
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
<div class="sidenav">
  <a href="{{ URL::to('batchcreate') }}">Create Batch</a>  
  <a href="{{ URL::to('batchlist') }}">Batch List</a>
  <a href="{{ URL::to('pftarget') }}">Physical & Financial Target</a>
  <a href="{{ URL::to('batchexpense') }}">Batch Expense</a>
  <a href="{{ URL::to('viewpftarget') }}">Physical & Financial Target Approval</a>
  <!-- <a href="{{ URL::to('candidateupload') }}">Candidate Upload</a> -->
  <!-- <a href="{{ URL::to('candidatemapping') }}">Candidate Mapping</a> -->
  <a href="{{ URL::to('candidatelist') }}">Candidate List</a>
  <a href="/employementexpense">Employment Status and Expenses</a>
</div>