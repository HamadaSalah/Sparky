@extends('Admin.master')
@section('content')
@push('styles')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

@endpush
@push('custom-scripts')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endpush
<h2 style="padding-bottom: 35px;float: left;margin-top: 0">Order Details</h2>
<div class="clearfix"></div>
<div class="table-responsive">
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Order ID</h6>
                </div>
                <div class="col-sm-3 text-secondary"> {{$order->id}}</div>
             </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">User Details</h6>
                </div>
                <div class="col-sm-3 text-secondary"> {{$order->user->name}}<br/>{{$order->user->phone}}</div>
             </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Emplyee Details</h6>
                </div>
                <div class="col-sm-3 text-secondary"> Employee Name<br/> Employee Number </div>
             </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Order Type</h6>
                </div>
                <div class="col-sm-3 text-secondary"> {{$order->category->name}} - {{$order->type}} </div>
             </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Status</h6>
                </div>
                <div class="col-sm-3 text-secondary"> <button class="btn btn-success"> {{$order->status}} </button></div>
             </div>
 
           

        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="AcceptModel" tabindex="-1" role="dialog" aria-labelledby="AcceptModelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="AcceptModelLabel">Complete Order To Checkout </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="">
            @csrf
            <input type="text" class="form-control" placeholder="Enter UUID Of Employee">
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Add</button>
        </div>
      </div>
    </div>
  </div>
  
@endsection
