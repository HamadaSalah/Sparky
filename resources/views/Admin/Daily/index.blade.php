@extends('Admin.master')
@section('content')
@push('styles')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

@endpush
@push('custom-scripts')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endpush
<h2 style="padding-bottom: 35px;float: left;margin-top: 0">All Daily Works</h2>
<div class="clear"></div>
@if ($dailys->count()>0)
<div class="table-responsive">
    <table class="table daily-table no-wrap" id="myDTable">
        <thead>
            <tr>
                <th class="border-top-0">#</th>
                <th class="border-top-0">Name</th>
                <th class="border-top-0">Phone</th>
                <th class="border-top-0">Category</th>
                <th class="border-top-0">Time</th>
                <th class="border-top-0">Amount</th>
                <th class="border-top-0">Start At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dailys as $key => $daily)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$daily->name}}</td>
                <td><a target="_blank" href="https://wa.me/{{$daily->phone}}">{{$daily->phone}}</a></td>
                <td>{{$daily->category}}</td>
                <td>{{$daily->hours}}</td>
                <td>{{$daily->amount}}</td>
                 <td>{{$daily->date}} || {{$daily->time}}</td>
                  {{-- <td>
                    <input type="checkbox" {{$daily->status ? 'checked':'' }} checked data-toggle="toggle" data-on="Enabled" data-off="Disabled">
                
                </td> --}}
                     {{-- <td>
                    <a href="{{route('admin.dailyworks.show', $daily->id)}}">
                        <button class="btn btn-success" type="submit"><i class="fa fa-eye"></i> View</button>
                    </a>
                </td> --}}

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
<style>
    .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
    }

    .switch input { 
    opacity: 0;
    width: 0;
    height: 0;
    }

    .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
    }

    .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
    }

    input:checked + .slider {
    background-color: #2196F3;
    }

    input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
    border-radius: 34px;
    }

    .slider.round:before {
    border-radius: 50%;
    }
</style>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

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
