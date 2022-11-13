@extends('Admin.master')
@section('content')
@push('styles')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

@endpush
@push('custom-scripts')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endpush
<h2 style="padding-bottom: 35px;float: left;margin-top: 0">All Employees</h2>
<div class="clear"></div>
@if ($users->count()>0)
<div class="table-responsive">
    <table class="table user-table no-wrap" id="myDTable">
        <thead>
            <tr>
                <th class="border-top-0">#</th>
                <th class="border-top-0">Img</th>
                <th class="border-top-0">Phone</th>
                <th class="border-top-0">Name</th>
                <th class="border-top-0">Activation</th>
                <th class="border-top-0">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
            <tr>
                <td>{{$key+1}}</td>
                <td>
                     @if ($user->photo == null)
                    <a data-fancybox="gallery" href="{{asset('photos/def.webp')}}"> 
                        <img src="{{asset('photos/def.webp')}}" style="width: 100px;height: 100px;" class="img-thumbnail" alt="">
                    </a>
                    @else
                    <a data-fancybox="gallery" href="{{asset('photos/'.$user->photo)}}"> 
                        <img src="{{asset('photos/'.$user->photo)}}" style="width: 100px;height: 100px;" class="img-thumbnail" alt="">
                    </a>
                    @endif
                </td>
                <td>{{$user->phone}}</td>
                <td>{{$user->name}}</td>
                {{-- <td>
                    <input type="checkbox" {{$user->status ? 'checked':'' }} checked data-toggle="toggle" data-on="Enabled" data-off="Disabled">
                
                </td> --}}
                <td>
                    <label class="switch ">
                        <input type="checkbox" value="{{$user->id}}" <?php if ($user->isVerified == true) {echo "checked";} ?>>
                        <span class="slider round MyToggleBtn"></span>
                      </label>
                      
                </td>

                    <td>
                    <form style="display: inline;" action="{{route('admin.employees.destroy', $user->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                    </form>
                    {{-- <a href="{{route('admin.users.show', $user->id)}}">
                        <button class="btn btn-success" type="submit"><i class="fa fa-eye"></i> View</button>
                    </a> --}}
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
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script>
    $(".MyToggleBtn").unbind('click').bind('click', function() {
        $.ajax({
        type: 'POST',
        url: '{{route('admin.UpdateEmpStatus')}}',
        data: {
            _token:"{{csrf_token()}}",
            'id': $(this).parent().find(':input').val()
        },
        success: function(data){
                           console.log(data);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            /* implementation goes here */
                        }
        });
    });
    
    </script>
    
@endpush

@endsection
