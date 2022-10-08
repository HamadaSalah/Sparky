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
                <th class="border-top-0">name</th>
                <th class="border-top-0">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cats as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
            <td>
                    <form style="display: inline;" action="{{route('admin.category.destroy', $category->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                    </form>
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
          <form action="{{route('admin.category.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="catname">Category Name</label>
                <input type="text" name="name" class="form-control" id="catname" aria-describedby="emailHelp" placeholder="Enter Category Name" required>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
       </div>
    </div>
  </div>
@endsection
