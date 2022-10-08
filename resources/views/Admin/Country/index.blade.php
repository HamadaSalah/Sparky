@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;margin-top: 0">All Countries</h2>
<div class="clear"></div>
@if ($counts->count()>0)
<div class="table-responsive">
    <table class="table user-table no-wrap" id="myDTable">
        <thead>
            <tr>
                <th class="border-top-0">#</th>
                <th class="border-top-0">name</th>
                <th class="border-top-0">Action to Block</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($counts as $key => $count)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$count->name}}</td>
                <td><a href="{{Route('admin.countries.edit', $count->id)}}"><button class="btn btn-danger">Edit Block List</button></a></td>

            </tr>

            @endforeach
        </tbody>
    </table>
</div>
@else
<div class="clearfix"></div>
<p class="text-center">No Data Available</p>    
@endif
@push('styles')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endpush
@push('custom-scripts')
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
    $(document).ready( function () {
        $('#myDTable').DataTable();
    } );
    </script>
@endpush
@endsection
