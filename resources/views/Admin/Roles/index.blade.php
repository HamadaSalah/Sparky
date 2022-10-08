@extends('Admin.master')
@section('content')
<div>
    <div style="">
        <a href="{{route('admin.roles.create')}}">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                Add New Role
            </button>
        </a>
    @if ($roles->count() == 0)
    <div style="display: block; clear: both;text-align: center">
        <p>No Roles Founded Please Add Products 🤗</p>
    </div>
    @else
        <div class="table-responsive table table-hover table-striped mt-4">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th class="border-top-0">#</th>
                <th class="border-top-0">Role Name</th>
                <th class="border-top-0">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $key => $col)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$col->name}}</td>
                <td>
                    <button class="btn btn-primary" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                    <form method="POST" action="{{--route('admin.roleDeleteProduct', $col->id)--}}" style="display: inline-block">
                        @csrf
                    <button class="btn btn-danger"> <i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                    </form>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>

    @endif

</div>

@endsection
