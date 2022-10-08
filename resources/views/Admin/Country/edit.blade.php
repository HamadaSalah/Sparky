@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;margin-top: 0">Edit Block List countries</h2>
<div class="clear"></div>
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
<style>        .bootstrap-tagsinput{
    width: 100%;
}
.label-info{
    background-color: #17a2b8;

}
.label {
    display: inline-block;
    padding: .25em .4em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,
    border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
label {
  text-align: right;
  float: right;
  direction: rtl;
  display: block;
  position: relative;
}
.form-check:not(.form-switch) .form-check-input[type="checkbox"] {
    background-image: none;
    float: right!important;
    text-align: right;
    display: inline-block;
    clear: both;
    margin-left: 30px!important;
}
nav .hidden {
  display: none
}
nav .justify-between {
  display: block;
    text-align: center;
    margin: auto;
    margin: 50px 0;
}
.cke_editable {
    font-size:20px;
}
</style>

@endpush


<div class="clearfix"></div>
<div class="row" style="width: 100%;display: block">  
    <form action="{{route('admin.countries.update', $country->id)}}" method="POST"  >
    @csrf
    @method('PUT')
     <p> Enter Country Name and Enter </p>
    <input type="text" data-role="tagsinput" name="blocklist" value="{{$country->blocklist}}"/> <br/>
    <div class="clearfix"></div>
    <br/>
    <button class="btn btn-success" type="submit">Save</button>
    </form>
</div>






@push('custom-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js" integrity="sha512-VvWznBcyBJK71YKEKDMpZ0pCVxjNuKwApp4zLF3ul+CiflQi6aIJR+aZCP/qWsoFBA28avL5T5HA+RE+zrGQYg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput-angular.min.js" integrity="sha512-KT0oYlhnDf0XQfjuCS/QIw4sjTHdkefv8rOJY5HHdNEZ6AmOh1DW/ZdSqpipe+2AEXym5D0khNu95Mtmw9VNKg==" crossorigin="anonymous"></script>

@endpush
@endsection
