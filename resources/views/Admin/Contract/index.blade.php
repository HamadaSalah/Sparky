@extends('Admin.master')
@section('content')
@push('styles')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

@endpush
@push('custom-scripts')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endpush
<h2 style="padding-bottom: 35px;float: left;margin-top: 0">All Contracts</h2>
<div class="clear"></div>
@if ($conts->count()>0)
<div class="table-responsive">
    <table class="table order-table no-wrap" id="myDTable">
        <thead>
            <tr>
                <th class="border-top-0">#</th>
                <th class="border-top-0">Order ID</th>
                <th class="border-top-0">Employee</th>
                <th class="border-top-0">Status</th>
                <th class="border-top-0">Date</th>
                <th class="border-top-0">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($conts as $key => $cont)
            <tr>
                <td>{{$key+1}}</td>
                <td>
                    {{$cont->order_id}}
                </td>
                <td>
                    {{$cont->user->name}}
                </td>
                <td>
                    <button class="btn btn-danger">No Paid</button>
                </td>
                <td>
                    {{$cont->created_at}}
                </td>
                <td>
                    <a href="{{route('admin.contract.show', $cont->id)}}">
                        <button class="btn btn-success">See Details</button>
                    </a>
                </td>

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
