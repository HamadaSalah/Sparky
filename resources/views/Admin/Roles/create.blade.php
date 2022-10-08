@extends('Admin.master')
@section('content')
<div>
<h3 style="padding-left: 15px;font-weight: 400;color: #333">Add New Role</h3>
    <form class="form-horizontal form-material" action="{{route('admin.roles.store')}}"  method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="col-md-12">Role Name</label>
            <div class="col-md-12">
                @error('name')
                <span class="validateforms" style="color: red">{{ $message }}</span>
                @enderror
                <input type="text" placeholder="Enter Role Name..."
                    class="form-control ps-0 form-control-line" name="roleName" wire:model.defer="data.name">
            </div>
        </div>
        <div class="alltabs">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                   <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="nc-icon nc-layers-3"> </i> Collection</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="nc-icon nc-grid-45"> </i> Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="nc-icon nc-app"> </i> Box</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="cat-tab" data-toggle="tab" href="#cat" role="tab" aria-controls="contact" aria-selected="false"><i class="nc-icon nc-bullet-list-67"> </i> Categort</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="brand-tab" data-toggle="tab" href="#brand" role="tab" aria-controls="contact" aria-selected="false"><i class="nc-icon nc-globe-2"> </i> Brand</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="user-tab" data-toggle="tab" href="#user" role="tab" aria-controls="contact" aria-selected="false"><i class="nc-icon nc-single-02"> </i> User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="role-tab" data-toggle="tab" href="#role" role="tab" aria-controls="contact" aria-selected="false"><i class="nc-icon nc-key-25"> </i> Roles</a>
                </li>
                </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <input type="checkbox" name="permission[]" value="Read Collection">Read Collection<br/>
                    <input type="checkbox" name="permission[]" value="Add Collection">Add Collection<br/>
                    <input type="checkbox" name="permission[]" value="Delete Collection">Delete Collection<br/>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <input type="checkbox" name="permission[]" value="Read Products">Read Products<br/>
                    <input type="checkbox" name="permission[]" value="Add Products">Add Products<br/>
                    <input type="checkbox" name="permission[]" value="Delete Products">Delete Products<br/>

                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <input type="checkbox" name="permission[]" value="Read Box">Read Box<br/>
                    <input type="checkbox" name="permission[]" value="Add Box">Add Box<br/>
                    <input type="checkbox" name="permission[]" value="Delete Box">Delete Box<br/>

                </div>
                <div class="tab-pane fade" id="cat" role="tabpanel" aria-labelledby="contact-tab">
                    <input type="checkbox" name="permission[]" value="Category">Category Control<br/>
                </div>
                <div class="tab-pane fade" id="brand" role="tabpanel" aria-labelledby="contact-tab">
                    <input type="checkbox" name="permission[]" value="Brand">Brand Control<br/>
                </div>
                <div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="contact-tab">
                    <input type="checkbox" name="permission[]" value="Read User">Read User<br/>
                    <input type="checkbox" name="permission[]" value="Add User">Add User<br/>
                    <input type="checkbox" name="permission[]" value="Delete User">Delete User<br/>
                </div>
                <div class="tab-pane fade" id="role" role="tabpanel" aria-labelledby="contact-tab">
                    <input type="checkbox" name="permission[]" value="Read Role">Read Role<br/>
                    <input type="checkbox" name="permission[]" value="Add Role">Add Role<br/>
                    <input type="checkbox" name="permission[]" value="Delete Role">Delete Role<br/>
                </div>
              </div>
              <button type="submit" wire:click="AddCol" class="btn btn-primary">Add Role</button>
        </div>

    </form>


</div>

@endsection
