@extends('Admin.master')
@section('content')
@push('styles')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

@endpush
@push('custom-scripts')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endpush
<h2 style="padding-bottom: 35px;float: left;margin-top: 0">Client Data</h2>
<div class="clearfix"></div>
<div class="table-responsive">
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Full Name</h6>
                </div>
                <div class="col-sm-9 text-secondary"> {{$user->name}}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">{{$user->email}}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Phone (Whatsapp)</h6>
                </div>
                <div class="col-sm-9 text-secondary"> {{$user->phone1}}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Mobile</h6>
                </div>
                <div class="col-sm-9 text-secondary">{{$user->phone2}}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Country</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    @if ($user->country)
                    {{$user->mycountry->name}}
                    @endif
                    
                   </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">city</h6>
                </div>
                <div class="col-sm-9 text-secondary"> 
                     @if ($user->address)
                    {{$user->mycity->name}}
                    @endif</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Family Members Count</h6>
                </div>
                <div class="col-sm-9 text-secondary"> {{$user->f_members}}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Living Type</h6>
                </div>
                <div class="col-sm-9 text-secondary">{{$user->place}}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Living Type</h6>
                </div>
                <div class="col-sm-9 text-secondary">{{$user->place}}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">User Description</h6>
                </div>
                <div class="col-sm-9 text-secondary">{!!$user->desc!!}</div>
            </div>
            <hr>
            <tr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">PRINT</h6>
                    </div>
                    <div class="col-sm-9 text-secondary"><a href="{{route('admin.printemp', $user->id)}}"><button class="btn btn-success">Print</button></a></div>
                </div>
             </tr>

             
        </div>
    </div>
</div>
@endsection
