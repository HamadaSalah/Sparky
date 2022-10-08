@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;margin-top: 0">All News</h2>
<a href="{{route('admin.news.create')}}">  
    <button class="btn btn-primary" style="float: right"><i class="fa fa-plus"> </i>  New News</button>
</a>
<div class="clear"></div>
@if ($news->count()>0)
<div class="table-responsive">
    <table class="table user-table no-wrap" id="myDTable">
        <thead>
            <tr>
                <th class="border-top-0">#</th>
                <th class="border-top-0">Head EN</th>
                <th class="border-top-0">Head AR</th>
                <th class="border-top-0">Category</th>
                {{-- <th class="border-top-0">Body</th> --}}
                <th class="border-top-0">Img</th>
                <th class="border-top-0">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $key => $new)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$new->getTranslation('head','en')}}</td>
                <td>{{$new->getTranslation('head','ar')}}</td>
                <td>{{$new->category->getTranslation('name','ar')}}</td>
                {{-- <td>{{mb_substr($new->body, 0, 100, 'utf-8')}}...</td> --}}
                <td>
                    <a data-fancybox="gallery" href="{{asset('img/'.$new->img)}}"> 
                        <img src="{{asset('img/'.$new->img)}}" style="width: 100px;height: 100px;" class="img-thumbnail" alt="">
                    </a>
                </td>
                    <td>
                    <form style="display: inline;" action="{{route('admin.news.destroy', $new->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                    </form>
                    <a href="{{Route('admin.news.edit', $new->id)}} ">
                        <button class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</button>
                    </a>
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
@endsection
