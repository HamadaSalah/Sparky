
@extends('Admin.master')
@section('content')
<h2 class="collectioName">Edit Settings</h2>
</a>
<div class="clearfix"></div>
<form method="POST" action="{{route('admin.settings.update', $settings->id)}}" enctype="multipart/form-data">
  @method('PUT')
  @csrf
  <div class="form-group">
    <label for="">Policy, Terms and Conditions</label>
    <textarea name="terms">{{$settings->terms}}</textarea>
    <script>
      CKEDITOR.replace( 'terms' );
      </script>
  </div>
  <div class="form-group">
    <label for="">About Us</label>
    <textarea name="aboutus">{{$settings->aboutus}}</textarea>
    <script>
      CKEDITOR.replace( 'aboutus' );
      </script>
  </div>
  <div class="form-group">
    <label for="">Address</label>
    <input type="text" name="address" value="{{$settings->address}}" class="input-group">
  </div>
  <div class="form-group">
    <label for="">phone</label>
    <input type="text" name="phone" value="{{$settings->phone}}" class="input-group">
  </div>
  <div class="form-group">
    <label for="">email</label>
    <input type="text" name="email" value="{{$settings->email}}" class="input-group">
  </div>
  

  
  <button class="btn btn-primary">Update Data</button>
</form>

@endsection

@push('styles')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
@endpush



