@extends('Admin.master')
@section('content')
@push('styles')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

@endpush
@push('custom-scripts')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endpush
<h2 style="padding-bottom: 35px;float: left;margin-top: 0">User Data</h2>
<div class="clearfix"></div>
<div class="table-responsive">
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0" style="height: 100%;display: flex;align-items: center;">Photo</h6>
                </div>
                <div class="col-sm-9 text-secondary"> <a data-fancybox="gallery"
                        href="{{ asset('photos/'.$user->photo) }}">
                        <img src="{{ asset('photos/'.$user->photo) }}"
                            style="width: 100px;height: 100px;" class="img-thumbnail" alt="">
                    </a></div>

            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Full Name</h6>
                </div>
                <div class="col-sm-9 text-secondary"> {{ $user->name }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">{{ $user->email }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Phone (Whatsapp)</h6>
                </div>
                <div class="col-sm-9 text-secondary"> {{ $user->phone1 }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Mobile</h6>
                </div>
                <div class="col-sm-9 text-secondary">{{ $user->phone2 }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Job</h6>
                </div>
                <div class="col-sm-9 text-secondary"> {{ $user->job_cat }} </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Country</h6>
                </div>
                <div class="col-sm-9 text-secondary">@if($user->country != '') {{ $user->mycountry->name }} @endif
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">City</h6>
                </div>
                <div class="col-sm-9 text-secondary">@if($user->city) {{ $user->mycity->name }} @endif</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Skills</h6>
                </div>
                <div class="col-sm-9 text-secondary"> {{ $user->skills }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Visa</h6>
                </div>
                <div class="col-sm-9 text-secondary">{{ $user->visa }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Countries (like to work)</h6>
                </div>
                <div class="col-sm-9 text-secondary">{{ $user->want_country }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Marital Status</h6>
                </div>
                <div class="col-sm-9 text-secondary">{{ $user->marital_status }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Number Of Status</h6>
                </div>
                <div class="col-sm-9 text-secondary">{{ $user->number_of_dependents }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Driver Licence From </h6>
                </div>
                <div class="col-sm-9 text-secondary">{{ $user->driving_license_issued_from }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">CV</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    @if($user->cv !='')
                        <a href="{{ route('mycv', $user->id) }}" target="_blank">
                            <button class="btn btn-success" type="button">Preview CV</button>
                        </a>
                    @endif
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Employee Profile</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <a target="_blank" id="MyprofileUUID"
                        href="https://deal-client.test/employeesecret/{{ $user->uuid }}">https://deal-client.test/employeesecret/{{ $user->uuid }}</a>
                    <button onclick="copyToClipboard('#MyprofileUUID')" class="btn" style="margin-left: 20px">Copy
                        text</button>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">make Contract</h6>
                </div>
                <div class="col-sm-9 text- ">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#ContractModal">Make Contract For
                        CLient </button>
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Employee Pay</h6>
                </div>
                <div class="col-sm-9 text- ">
                    <button class="btn btn-success" data-toggle="modal" data-target="#EmpPay">Ask Employee To Pay
                    </button>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">ID FRONT</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    @if($user->ID_front !='')
                        <a href="{{asset('UserDataUploads/'.$user->ID_front)}}" target="_blank">
                            <button class="btn btn-success" type="button">Download</button>
                        </a>
                    @endif
                </div>
            </div>
            <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">ID Back</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        @if($user->ID_back !='')
                            <a href="{{asset('UserDataUploads/'.$user->ID_back)}}" target="_blank" download>
                                <button class="btn btn-success" type="button">Download</button>
                            </a>
                        @endif
                    </div>
                </div>
                <hr>
    
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Medical Report</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        @if($user->medical_report !='')
                            <a href="{{asset('UserDataUploads/'.$user->medical_report)}}" target="_blank" download>
                                <button class="btn btn-success" type="button">Download</button>
                            </a>
                        @endif
                    </div>
                </div>
                <hr>
    
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Passport</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        @if($user->Passport !='')
                            <a href="{{asset('UserDataUploads/'.$user->Passport)}}" target="_blank" download>
                                <button class="btn btn-success" type="button">Download</button>
                            </a>
                        @endif
                    </div>
                </div>
                <hr>
    
                    </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="ContractModal" tabindex="-1" role="dialog" aria-labelledby="ContractModalTitle"
    aria-hidden="true">
    <div class="modal-dialog  " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">New Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="{{ route('admin.AddNewPay') }}">
                        @csrf
                        @method('POST')
                        <input type="hidden" value="{{ $user->id }}" name="employee_id">
                        <div class="form-group">
                            <label for="UUid">Order ID </label>
                            <input type="text" class="form-control" id="UUid" placeholder="Enter uuid Of Order"
                                name="order_id">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Account Type ( Personal - Company )</label>
                            <select class="form-control acc_type" id="exampleFormControlSelect1" name="acc_type">
                                <option id="person" value="personal">Personal</option>
                                <option id="company" value="company">Company</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Work Type ( Daily - Permenant )</label>
                            <select class="form-control acc_type" id="exampleFormControlSelect1" name="work_type">
                                <option id="person" value="Daily">Daily</option>
                                <option id="company" value="Permenant">Permenant</option>
                            </select>
                        </div>
                        <div class="form-group COMPANY">
                            <label for="UUid">Salary Of Employee ( <span style="color: green">KD</span> )</label>
                            <input type="number" class="form-control" id="UUid" placeholder="Enter Salary"
                                name="salary">
                        </div>
                        <div class="form-group COMPANY">
                            <label for="UUid">Fees Of Country ( <span style="color: green">KD</span> )</label>
                            <input type="number" class="form-control" id="UUid" placeholder="Enter Fees" name="fees">
                        </div>
                        <div class="form-group">
                            <label for="UUid">Deal Website Commision ( <span style="color: green">KD</span> )</label>
                            <input type="number" class="form-control" id="UUid" placeholder="Enter Commission"
                                name="deal_com">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>

            </div>
        </div>
    </div>
</div>
{{-- MAKE EMPLOYEE ASK PAYYYY --}}
<div class="modal fade" id="EmpPay" tabindex="-1" role="dialog" aria-labelledby="EmpPayTitle"
    aria-hidden="true">
    <div class="modal-dialog  " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">New Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="{{ route('admin.EmpPay') }}">
                        @csrf
                        @method('POST')
                        <input type="hidden" value="{{ $user->id }}" name="user_id">
                        <div class="form-group">
                            <label for="amount">GULF Website Commision ( <span style="color: green">KD</span> )</label>
                            <input type="number" class="form-control" id="amount" placeholder="Enter Commission"
                                name="amount">
                        </div>
                        <div class="form-group">
                            <label for="amount">Details of Contract</label>
                          <textarea name="" id="" style="height: 100px" cols="50" rows="50" name="details"  class="form-control" placeholder="Enter Your Details" ></textarea>
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
@push('custom-scripts')
    <script>
        function copyToClipboard(element) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).text()).select();
            document.execCommand("copy");
            $temp.remove();
        }
        $(document).ready(function () {
            $('.acc_type').on('change', function () {
                if ($(this).val() == 'personal') {
                    $('.COMPANY').css("display", "none");
                } else if ($(this).val() == 'company') {
                    $('.COMPANY').css("display", "block");
                }
            });
        });

    </script>
@endpush
