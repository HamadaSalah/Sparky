@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;margin-top: 0">All Categories</h2>
   
    <button class="btn btn-primary" style="float: right" type="button" class="btn btn-primary" data-toggle="modal" data-target="#CraeteCatMod">
        <i class="fa fa-plus"> </i>New Category
    </button>
 
<div class="clearfix"></div>
@if ($cats->count() <= 0)
<div class="text-center">No Data Available</div>
@else
<div class="table-responsive">
    <table class="table user-table no-wrap" id="myDTable">
        <thead>
            <tr>
                <th class="border-top-0">#</th>
                <th class="border-top-0">img</th>
                <th class="border-top-0">name</th>
                <th class="border-top-0">Main Category</th>
                <th class="border-top-0">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cats as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>
                  <a data-fancybox="gallery" href="{{asset('cats/'.$category->img)}}"> 
                  <img src="{{asset('cats/'.$category->img)}}" style="width: 100px;height: 100px;" class="img-thumbnail" alt="">
                  </a>
                </td>
                <td>{{$category->name}}</td>
                <td>
                  @if($category->category  ) 
                  
                 <span style="background: green;padding: 2px 5px;color: #FFF;border-radius: 5px"> {{$category->category->name}}</span>
                @endif</td>
            <td>
                    <form style="display: inline;" action="{{route('admin.category.destroy', $category->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                    </form>
                    <a href="{{route('admin.category.edit', $category->id)}}"><button class="btn btn-success" value="{{ $category->id }}" type="submit"><i class="fa fa-trash"></i> Edit</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>    
@endif


<!-- Modal -->
<div class="modal fade" id="CraeteCatMod" tabindex="-1" role="dialog" aria-labelledby="CraeteCatModLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="CraeteCatModLabel">Add New Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="catname">Category Name</label>
                <input type="text" name="name" class="form-control" id="catname" aria-describedby="emailHelp" placeholder="Enter Category Name" required>
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">select Main Category</label>
                <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                  <option value="">Have Main Cat?</option>
                  @foreach ($maincats as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
                </select>
                <div class="form-group">
                  <label for="catname">Category Name</label>
                  <input type="file" name="img" class="form-control" >
                </div>
  
              </div>
            
              <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
       </div>
    </div>
  </div>
  

@endsection
  