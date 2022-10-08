@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;">Edit About Us Data </h2>

<div class="clearfix"></div>

<form method="POST" action="{{route('admin.about.update', $about->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Mission EN</label>
        <input type="name" class="form-control" id="name" name="mission[en]"  placeholder="Write mission.." required value="{{$about->getTranslation('mission','en')}}">
    </div>
    <div class="form-group">
        <label for="name">Mission AR</label>
        <input type="name" class="form-control" id="name" name="mission[ar]"  placeholder="Write mission.." required value="{{$about->getTranslation('mission','ar')}}">
    </div>
    <div class="form-group">
        <label for="name">Reason EN</label>
        <input type="name" class="form-control" id="name" name="reason[en]"  placeholder="Write reason.." required value="{{$about->getTranslation('reason','en')}}">
    </div>
    <div class="form-group">
        <label for="name">Reason AR</label>
        <input type="name" class="form-control" id="name" name="reason[ar]"  placeholder="Write reason.." required value="{{$about->getTranslation('reason','ar')}}">
    </div>
    <div class="form-group">
        <a data-fancybox="gallery" href="{{asset('img/'.$about->img)}}"> 
            <img id="output" src="{{asset('img/'.$about->img)}}" style="width: 100px;" class="img-thumbnail" alt=""></a>
        <br/>
        <label for="name">Img</label>
        <input type="file" class="form-control" id="name" name="img"  onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@push("custom-css")

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

@endpush
@endsection
