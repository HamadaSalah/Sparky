@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;margin-top: 0">News Categories</h2>
<a href="{{route('admin.newscategory.create')}}">  
    <button class="btn btn-primary" style="float: right"><i class="fa fa-plus"> </i>New Category</button>
</a>
<div class="clearfix"></div>
@if ($categories->count() <= 0)
<div class="text-center">No Data Available</div>
@else
<div class="table-responsive">
    <table class="table user-table no-wrap" id="myDTable">
        <thead>
            <tr>
                <th class="border-top-0">#</th>
                <th class="border-top-0">Name EN</th>
                <th class="border-top-0">Name Ar</th>
                <th class="border-top-0">IMG</th>
                <th class="border-top-0">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $key => $category)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$category->getTranslation('name','en')}}</td>
                <td>{{$category->getTranslation('name','ar')}}</td>
                <td>
                    <a data-fancybox="gallery" href="{{asset('img/'.$category->img)}}"> 
                        <img src="{{asset('img/'.$category->img)}}" style="width: 100px;height: 100px;" class="img-thumbnail" alt="">
                    </a>
                </td>
            <td>
                <a href="{{route('admin.newscategory.edit', $category->id)}}">
                    <button class="btn btn-success" type="submit"><i class="fas fa-edit"></i> Edit</button>
                </a>   
                    <form style="display: inline;" action="{{route('admin.newscategory.destroy', $category->id)}}" method="post">
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
@endsection
