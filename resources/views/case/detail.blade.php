@extends('layouts.dashboard')

@section('head')

    <link href="{{ asset('cssnew/datepicker/jquery-ui.css') }}" rel="stylesheet">
    <script src="{{ asset('cssnew/datepicker/js/jquery-3.1.1.js') }}"></script>
    <script src="{{ asset('cssnew/datepicker/jquery-ui.js') }}"></script>
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
        function test(obj) {

            if ((obj.value == document.getElementById('youth_name1').innerHTML) || (obj.value == document.getElementById('youth_name2').innerHTML)) {
                document.getElementById("delCase").disabled = false;
            } else {
                document.getElementById("delCase").disabled = true;
            }
        }
    </script>

    <script type="text/javascript">
        // When the document is ready
        $(document).ready(function () {

            $('#example1').datepicker({
                dateFormat: "mm/dd/yy",
                maxDate: new Date(),
                changeYear: true,
                changeMonth: true
            });
            $('#start_date1').datepicker({
                dateFormat: "mm/dd/yy",
                changeYear: true,
                changeMonth: true
            });
            $('#end_date1').datepicker({
                dateFormat: "mm/dd/yy",
                changeYear: true,
                changeMonth: true,
            });
            $('#start_date2').datepicker({
                dateFormat: "mm/dd/yy",
                changeYear: true,
                changeMonth: true
            });
            $('#end_date2').datepicker({
                dateFormat: "mm/dd/yy",
                changeYear: true,
                changeMonth: true,
            });
            $('#start_date_edu1').datepicker({
                dateFormat: "mm/dd/yy",
                changeYear: true,
                changeMonth: true
            });
            $('#end_date_edu1').datepicker({
                dateFormat: "mm/dd/yy",
                changeYear: true,
                changeMonth: true,
            });
            $('#start_date_edu2').datepicker({
                dateFormat: "mm/dd/yy",
                changeYear: true,
                changeMonth: true
            });
            $('#end_date_edu2').datepicker({
                dateFormat: "mm/dd/yy",
                changeYear: true,
                changeMonth: true,
            });
            $('#birthday_edit').datepicker({
                dateFormat: "mm/dd/yy",
                changeYear: true,
                changeMonth: true,
            });


        });

    </script>
@stop

@section('content')
    <?php $youth_name1 = $data->last_name . ', ' . $data->first_name; $youth_name2 = $data->first_name . ' ' . $data->last_name ?>
    <div id="youth_name1" style="display: none; visibility: hidden;">{{$youth_name1}}</div>
    <div id="youth_name2" style="display: none; visibility: hidden;">{{$youth_name2}}</div>
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text"></i>Profile</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{ url('login') }}">Home</a></li>
                <li><i class="fa fa-folder-open"></i>Case Management</li>
                <?php if ($user = Sentinel::check()) {
                    $admin = Sentinel::findRoleByName('Admins');
                    $manager = Sentinel::findRoleByName('Managers');
                    $staff = Sentinel::findRoleByName('Staff');
                    $youth = Sentinel::findRoleByName('Youths');
                } ?>
                @if($user->inRole($admin))
                    <li><i class="fa fa-list"></i><a href="{{ url('/admin/case/view') }}">View Cases</a></li>
                @elseif($user->inRole($manager))
                    <li><i class="fa fa-list"></i><a href="#">View Cases</a></li>
                @elseif($user->inRole($staff))
                    <li><i class="fa fa-list"></i><a href="#">View Cases</a></li>
                @endif
                <li><i class="fa fa-file-text"></i>Profile</li>
            </ol>
        </div>
    </div>

    @if($user->inRole($admin))
        <div class="row profile">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {{--Avatar--}}
                        <div class="col-md-4" style="margin-top: 20px">
                            <div class="text-center">
                                <img class="img-profile" src="{{ asset('cssnew/assets/img/avatar.jpg') }}">
                            </div>
                            <h3 class="text-center"><strong>{{ $data->first_name.' '.$data->last_name }}</strong></h3>
                            @if($caseUser == null)
                                <button type="button" class="btn btn-block btn-success center-block" style="width: 45%"
                                        data-toggle="modal" data-target="#createAccount">
                                    Create Account
                                </button>
                            @endif
                            <h4 class="text-center">
                                <small><i class="fa fa-map-marker"></i> California, USA</small>
                            </h4>
                            <hr>
                            <div class="text-center">
                                <li><a href="#" class="fa fa-facebook facebook-bg"></a></li>
                                <li><a href="#" class="fa fa-twitter twitter-bg"></a></li>
                                <li><a href="#" class="fa fa-linkedin linkedin-bg"></a></li>
                            </div>
                        </div>
                        {{--General Information--}}
                        <div class="col-md-8" style="margin-top: 20px">
                            <h4><strong>General Information</strong></h4>
                            <div class="col-md-4">
                                <ul class="profile-details">
                                    <li>
                                        <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                                       style="color: #4C4F53"></i><strong>
                                                Gender</strong>
                                        </div>
                                        <div style="color: #6699CC">
                                            @if($data->gender)
                                                {{ $data->gender }}
                                            @else
                                                N/A
                                            @endif
                                        </div>
                                    </li>
                                    <li>
                                        <div style="color: #4C4F53"><i class="fa fa-calendar"
                                                                       style="color: #4C4F53"></i><strong>
                                                Birthday</strong>
                                        </div>
                                        <div style="color: #6699CC">
                                            @if($data->birthday)
                                                {{ date('m/d/Y', strtotime($data->birthday)) }}
                                            @else
                                                N/A
                                            @endif
                                        </div>
                                    </li>
                                    <li>
                                        <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                                       style="color: #4C4F53"></i><strong>
                                                Webpage</strong>
                                        </div>
                                        <div style="color: #6699CC">
                                            @if($data->webpage)
                                                {{ $data->webpage }}
                                            @else
                                                N/A
                                            @endif
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="profile-details">
                                    <li>
                                        <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                                       style="color: #4C4F53"></i><strong> Social
                                                Security
                                                Number</strong></div>
                                        <div style="color: #6699CC">
                                            @if($data->ssn)
                                                {{ $data->ssn }}
                                            @else
                                                N/A
                                            @endif
                                        </div>
                                    </li>
                                    <li>
                                        <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                                       style="color: #4C4F53"></i><strong>
                                                Status</strong>
                                        </div>
                                        @if($data->status)
                                            <div style="color: #6699CC">Active</div>
                                        @else
                                            <div style="color: #6699CC">Inactive</div>
                                        @endif
                                    </li>
                                    <li>
                                        <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                                       style="color: #4C4F53"></i><strong> ILP</strong>
                                        </div>
                                        @if($data->ILP == 1)
                                            <div style="color: #6699CC">Yes</div>
                                        @elseif($data->ILP == 0)
                                            <div style="color: #6699CC">No</div>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="profile-details">
                                    <li>
                                        <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                                       style="color: #4C4F53"></i><strong>
                                                Ethnicity</strong></div>
                                        <div style="color: #6699CC">
                                            @if($data->ethnicity)
                                                {{ $data->ethnicity }}
                                            @else
                                                N/A
                                            @endif
                                        </div>
                                    </li>
                                    <li>
                                        <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                                       style="color: #4C4F53"></i><strong>
                                                Program</strong>
                                        </div>
                                        <div style="color: #6699CC">
                                            @if($data->program)
                                                {{ $data->program }}
                                            @else
                                                N/A
                                            @endif
                                        </div>
                                    </li>
                                    <li>
                                        <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                                       style="color: #4C4F53"></i><strong>
                                                Manager</strong>
                                        </div>
                                        <div style="color: #6699CC">{{ $data->cm_name }}
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-12" style="margin-top: 13px">
                                <div class="row">
                                    <div class="col-md-4">
                                        @if($data->status)
                                            <button id="case_edit" type="button" class="btn btn-block btn-primary"
                                                    data-toggle="modal" data-target="#editProfile">
                                                Edit
                                            </button>
                                        @else
                                            <button id="case_edit_disabled" type="button"
                                                    class="btn btn-block btn-primary"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="Need to activate this case first.">
                                                Edit
                                            </button>
                                        @endif
                                    </div>
                                    @if($data->status)
                                        <div class="col-md-4">
                                            <a href="{{ url('admin/case/'. $data->id.'/inactive') }}"
                                               class="btn btn-block btn-warning"
                                               role="button" id="case_inactive">Inactive</a>
                                        </div>
                                    @else
                                        <div class="col-md-4">
                                            <a href="{{ url('admin/case/'. $data->id.'/active') }}"
                                               class="btn btn-block btn-success"
                                               role="button" id="case_inactive">Active</a>
                                        </div>
                                    @endif
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-block btn-danger"
                                                data-toggle="modal" data-target="#deleteCase">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--Contact Information--}}
                        <div class="col-md-12"
                             style="border-top: 1px #EEEEEE solid; margin-top: 15px; padding-top: 10px">
                            <h4><strong>Contact Information</strong></h4>
                            <div class="col-md-12" style="">
                                <div class="col-md-10">
                                    <h5><strong>Address</strong></h5>
                                </div>
                                <div class="col-md-2">
                                    @if($data->status)
                                        <button type="button" class="btn btn-primary"
                                                style="padding-left: 50px; padding-right: 50px" data-toggle="modal"
                                                data-target="#addaddress"> Add
                                        </button>
                                    @endif
                                </div>
                                <table class="table table-striped" style="margin-left: 15px">
                                    <thead>
                                    <tr>
                                        <th style="width: 14%;">Address</th>
                                        <th style="width: 14%;">City</th>
                                        <th style="width: 14%;">State</th>
                                        <th style="width: 14%;">ZipCode</th>
                                        <th style="width: 14%;">Status</th>
                                        <th style="width: 14%;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($case_address as $address)
                                        <tr>
                                            <td>{{$address->address}}</td>
                                            <td>{{$address->city}}</td>
                                            <td>{{$address->state}}</td>
                                            <td>{{$address->zipcode}}</td>
                                            <td>{{$address->status}}</td>
                                            <td>Actions</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12" style="">
                                <div class="col-md-10">
                                    <h5><strong>Phone</strong></h5>
                                </div>
                                <div class="col-md-2">
                                    @if($data->status)
                                        <button type="button" class="btn btn-primary"
                                                style="padding-left: 50px; padding-right: 50px" data-toggle="modal"
                                                data-target="#addphone"> Add
                                        </button>
                                    @endif
                                </div>
                                <table class="table table-striped" style="margin-left: 15px">
                                    <thead>
                                    <tr>
                                        <th style="width: 14%;">Type</th>
                                        <th style="width: 14%;">Number</th>
                                        <th style="width: 14%;">Status</th>
                                        <th style="width: 14%;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr></tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12" style="">
                                <div class="col-md-10">
                                    <h5><strong>Email</strong></h5>
                                </div>
                                <div class="col-md-2">
                                    @if($data->status)
                                        <button type="button" class="btn btn-primary"
                                                style="padding-left: 50px; padding-right: 50px" data-toggle="modal"
                                                data-target="#addemail"> Add
                                        </button>
                                    @endif
                                </div>
                                <table class="table table-striped" style="margin-left: 15px">
                                    <thead>
                                    <tr>
                                        <th style="width: 14%;">Primary</th>
                                        <th style="width: 14%;">Email</th>
                                        <th style="width: 14%;">Status</th>
                                        <th style="width: 14%;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr></tr>
                                    </tbody>
                                </table>
                            </div>


                            {{--<ul class="profile-details col-md-4">--}}
                            {{--<li>--}}
                            {{--<div style="color: #4C4F53"><i class="fa fa-tablet" style="color: #4C4F53"></i> Mobile--}}
                            {{--</div>--}}
                            {{----}}

                            {{--</li>--}}

                            {{--</ul>--}}
                            {{--<ul class="profile-details col-md-4">--}}
                            {{--<li>--}}
                            {{--<div style="color: #4C4F53"><i class="fa fa-envelope" style="color: #4C4F53"></i> E-mail--}}
                            {{--</div>--}}

                            {{--</li>--}}
                            {{--</ul>--}}
                            {{--<ul class="profile-details col-md-4">--}}
                            {{--<li>--}}
                            {{--<div style="color: #4C4F53"><i class="fa fa-map-marker" style="color: #4C4F53"></i>--}}
                            {{--Address--}}
                            {{--</div>--}}
                            {{--</li>--}}
                            {{--</ul>--}}
                        </div>
                        {{--Notes --}}
                        <div class="col-md-12"
                             style="border-top: 1px #EEEEEE solid; margin-top: 15px; padding-top: 10px">
                            <div class="col-md-10">
                                <h4><strong>Notes</strong></h4>
                            </div>
                            <div class="col-md-2">
                                @if($data->status)
                                    <button type="button" class="btn btn-primary"
                                            style="padding-left: 50px; padding-right: 50px"> Add
                                    </button>
                                @endif
                            </div>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 14%;">From whom</th>
                                    <th style="width: 14%;">To whom</th>
                                    <th style="width: 14%;">XXX</th>
                                    <th style="width: 14%;">XXX</th>
                                    <th style="width: 14%;">XXX</th>
                                    <th style="width: 14%;">XXX</th>
                                    <th style="width: 14%;">XXX</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr></tr>
                                </tbody>
                            </table>
                        </div>
                        {{--Additional Contacts--}}
                        <div class="col-md-12"
                             style="border-top: 1px #EEEEEE solid; margin-top: 15px; padding-top: 10px">
                            <div class="col-md-10">
                                <h4><strong>Additional Contacts</strong></h4>
                            </div>
                            <div class="col-md-2">
                                @if($data->status)
                                    <button type="button" class="btn btn-primary"
                                            style="padding-left: 50px; padding-right: 50px" data-toggle="modal"
                                            data-target="#addcontact"> Add
                                    </button>
                                @endif
                            </div>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 14%;">Name</th>
                                    <th style="width: 14%;">Relationship</th>
                                    <th style="width: 14%;">Phone</th>
                                    <th style="width: 14%;">Email</th>
                                    <th style="width: 14%;">Address</th>
                                    <th style="width: 14%;">Status</th>
                                    @if($data->status)
                                        <th style="width: 14%;">Action</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($addcontacts as $addcontact)
                                    <tr>
                                        <td>{{$addcontact->name}}</td>
                                        <td>{{$addcontact->relationship}}</td>
                                        <td>{{$addcontact->phone}}</td>
                                        <td>{{$addcontact->email}}</td>
                                        <td>{{$addcontact->address}}</td>
                                        <td>{{$addcontact->status}}</td>
                                        @if($data->status)
                                            <td>
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                        data-target="#viewaddcontact{{$addcontact->id}}"
                                                >
                                                    <i class="fa fa-search-plus" style="width: 10px"></i>
                                                </button>
                                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#editaddcontact{{$addcontact->id}}"
                                                >
                                                    <i class="fa fa-pencil-square-o" style="width: 10px"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#deleteaddcontact{{$addcontact->id}}"
                                                >
                                                    <i class="fa fa-trash-o" style="width: 10px"></i>
                                                </button>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{--Education History--}}
                        <div class="col-md-12"
                             style="border-top: 1px #EEEEEE solid; margin-top: 15px; padding-top: 10px">
                            <div class="col-md-10">
                                <h4><strong>Education History</strong></h4>
                            </div>
                            <div class="col-md-2">
                                @if($data->status)
                                    <button type="button" class="btn btn-primary"
                                            style="padding-left: 50px; padding-right: 50px" data-toggle="modal"
                                            data-target="#addeduhistory"> Add
                                    </button>
                                @endif
                            </div>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 14%;">Start Date</th>
                                    <th style="width: 14%;">End Date</th>
                                    <th style="width: 14%;">School</th>
                                    <th style="width: 14%;">Level</th>
                                    <th style="width: 14%;">Address</th>
                                    <th style="width: 14%;">Status</th>
                                    @if($data->status)
                                        <th style="width: 14%;">Action</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($eduhistorys as $eduhistory)
                                    <tr>
                                        <td>{{$eduhistory->start_date}}</td>
                                        <td>{{$eduhistory->end_date}}</td>
                                        <td>{{$eduhistory->school}}</td>
                                        <td>{{$eduhistory->level}}</td>
                                        <td>{{$eduhistory->address}}</td>
                                        <td>{{$eduhistory->status}}</td>
                                        @if($data->status)
                                            <td>
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                        data-target="#vieweduhistory{{$eduhistory->id}}">
                                                    <i class="fa fa-search-plus" style="width: 10px"></i>
                                                </button>
                                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#editeduhistory{{$eduhistory->id}}">
                                                    <i class="fa fa-pencil-square-o" style="width: 10px"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#deleteeduhistory{{$eduhistory->id}}">
                                                    <i class="fa fa-trash-o" style="width: 10px"></i>
                                                </button>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{--Work History--}}
                        <div class="col-md-12"
                             style="border-top: 1px #EEEEEE solid; margin-top: 15px; padding-top: 10px">
                            <div class="col-md-10">
                                <h4><strong>Work History</strong></h4>
                            </div>
                            <div class="col-md-2">
                                @if($data->status)
                                    <button type="button" class="btn btn-primary"
                                            style="padding-left: 50px; padding-right: 50px"
                                            data-toggle="modal" data-target="#addworkhistory">
                                        Add
                                    </button>
                                @endif
                            </div>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 14%;">Start Date</th>
                                    <th style="width: 14%;">End Date</th>
                                    <th style="width: 14%;">Company</th>
                                    <th style="width: 14%;">Industry</th>
                                    <th style="width: 14%;">Address</th>
                                    <th style="width: 14%;">Status</th>
                                    @if($data->status)
                                        <th style="width: 14%;">Action</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($workhistorys as $workhistory)
                                    <tr>
                                        <td>{{$workhistory->start_date}}</td>
                                        <td>{{$workhistory->end_date}}</td>
                                        <td>{{$workhistory->company}}</td>
                                        <td>{{$workhistory->industry}}</td>
                                        <td>{{$workhistory->address}}</td>
                                        <td>{{$workhistory->status}}</td>
                                        @if($data->status)
                                            <td>
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                        data-target="#viewworkhistory{{$workhistory->id}}">
                                                    <i class="fa fa-search-plus" style="width: 10px"></i>
                                                </button>
                                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#editworkhistory{{$workhistory->id}}">
                                                    <i class="fa fa-pencil-square-o" style="width: 10px"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#deleteworkhistory{{$workhistory->id}}">
                                                    <i class="fa fa-trash-o" style="width: 10px"></i>
                                                </button>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{--Vital Documents--}}
                        <div class="col-md-12"
                             style="border-top: 1px #EEEEEE solid; margin-top: 15px; padding-top: 10px">
                            <div class="col-md-10">
                                <h4><strong>Vital Documents</strong></h4>
                            </div>
                            <div class="col-md-2">
                                @if($data->status)
                                    <button type="button" class="btn btn-primary"
                                            style="padding-left: 50px; padding-right: 50px"
                                            data-toggle="modal" data-target="#uploaddocument">
                                        Add
                                    </button>
                                @endif
                            </div>
                            <table class="table table-striped">
                                <thead>
                                <tr style="text-align: left">
                                    <th style="width: 14%;">Type</th>
                                    <th style="width: 14%;">Title</th>
                                    <th style="width: 14%;">Uploaded By</th>
                                    <th style="width: 21%;">Upload Date</th>
                                    <th style="width: 21%;">Last Modified Date</th>
                                    @if($data->status)
                                        <th style="width: 14%;">Action</th>
                                    @endif
                                </tr>

                                </thead>
                                <tbody>
                                @foreach($docs as $doc)
                                    <tr>
                                        <td>{{$doc->type}}</td>
                                        <td>
                                            <a href="http://localhost/elockboxdev/storage/app/{{$doc->path}}/{{$doc->filename}}"
                                               target="_blank" data-toggle="tooltip" data-placement="top"
                                               title="{{$doc->description}}">{{$doc->title}}</a></td>
                                        <td>{{$doc->uploader}}</td>
                                        <td>{{date("m/d/Y H:i:s", strtotime($doc->created_at))}}</td>
                                        <td>{{date("m/d/Y H:i:s", strtotime($doc->updated_at))}}</td>
                                        @if($data->status)
                                            <td>
                                                <a class="btn btn-success"
                                                   href="http://localhost/elockboxdev/storage/app/{{$doc->path}}/{{$doc->filename}}"
                                                   target="_blank">
                                                    <i class="fa fa-file-pdf-o" style="width: 10px"></i>
                                                </a>
                                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#{{$doc->id}}">
                                                    <i class="fa fa-pencil-square-o" style="width: 10px"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#del{{$doc->id}}">
                                                    <i class="fa fa-trash-o" style="width: 10px"></i>
                                                </button>
                                            </td>
                                        @endif
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div><!--/.col-->
        </div><!--/.row profile-->


        <!-- create user from case  popup window-->
        <div class="modal fade" style="margin-top:10%" id="createAccount" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Create Youth Account</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['route' => ['admin.case.create.account', $data->id]]) !!}
                        @if (session()->has('flash_message'))
                            <div class="form-group">
                                <p>{{ session()->get('flash_message') }}</p>
                            </div>
                        @endif
                        {{--improve performance--}}
                        {{--we should detect whether email and pwd are valid while inputing, rather than after submit--}}
                        <div class="form-group row">
                            {!! Form::label('email', 'Email*', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px']) !!}
                            <div class="col-md-10">
                                {!! Form::text('email', $data->email, ['placeholder' => 'Email', 'required' => 'required', 'class' => 'form-control', 'disabled']) !!}
                                @if($errors->has('email'))
                                    {!! $errors->first('email') !!}
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('password', 'Password*', ['class' => 'col-md-2 col-form-label', 'style' => 'padding-top:7px']) !!}
                            <div class="col-md-10">
                                {!! Form::password('password', ['placeholder' => 'Password', 'required' => 'required', 'class' => 'form-control']) !!}
                                @if($errors->has('password'))
                                    {!! $errors->first('password') !!}
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('password', 'Password*', ['class' => 'col-md-2 col-form-label', 'style' => 'padding-top:7px']) !!}
                            <div class="col-md-10">
                                {!! Form::password('password_confirmation', ['placeholder' => 'Confirm password', 'required' => 'required', 'class' => 'form-control']) !!}
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            {!! Form::button('Cancel', ['class' => 'btn btn-secondary', 'data-dismiss' => 'modal']) !!}
                            {!! Form::submit('Create and Activate', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- end create account -->

        <!-- delete case -->
        <div class="modal fade" style="margin-top:10%" id="deleteCase" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Are you ABSOLUTELY sure?</h4>
                    </div>
                    <div style="background-color: #F8EEC7; padding-top: 10px; padding-bottom: 10px; padding-left: 15px">
                        Unexpected bad things will happen if you don’t read this!
                    </div>
                    <div class="modal-body">
                        This action <strong>CANNOT</strong> be undone.<br>
                        This will permanently delete this case, case profile, youth account, history and documents.<br>
                        We <strong>SUGGEST</strong> you to <strong>inactivate</strong> instead.<br><br>
                        <strong>Please input Youth name of this case:</strong><br>
                        Notice: Either "Firstname Lastname" or "Lastname, Firstname" is OK.
                        {!! Form::open(['url' => 'admin/case/'.$data->id.'/delete']) !!}
                        <div class="form-group row" style="margin-top: 10px; padding-left: 15px; padding-right: 15px;">
                            {{ Form::text('youth_name', null, ['placeholder' => '"Lastname, Firstname" or "Firstname Lastname"', 'class' => 'form-control', 'style' => 'margin-bottom: 15px', 'onkeyup' => 'test(this)', 'autocomplete' => 'off']) }}

                            {{ Form::submit('I understand the consequences, delete this case', ['id' => 'delCase', 'class' => 'btn btn-danger pull-right', 'disabled']) }}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- end delete case -->

        <!-- upload doc-->
        <div class="modal fade" style="margin-top:10%" id="uploaddocument" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Upload Documents</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['url' => '/admin/case/upload', 'files' => 'true']) !!}
                        {{ csrf_field() }}
                        <div class="form-group" style="display: none; visibility: hidden">
                            {!! Form::text('id', $data->id) !!}
                        </div>
                        <div class="form-group row">
                            {{ Form::label('title', 'Title', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('title', null, ['placeholder' => 'Document title', 'class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('type', 'Type', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::select('type', ['SS' => 'Social Security', 'DL' => 'Driver License'], null, ['placeholder' => 'Choose document type...', 'class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('description', 'Description', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::textarea('description', null, ['placeholder' => 'Input document description', 'class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('visible', 'Visible', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::select('visible', ['visible' => 'visible', 'invisible' => 'invisible'], null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('xxx', 'Uploaded By', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('xxx', $user->first_name.' '.$user->last_name, ['placeholder' => 'Uploaded By...', 'class' => 'form-control', 'disabled']) }}
                            </div>
                        </div>
                        <div class="form-group row" style="display: none; visibility: hidden">
                            {{ Form::label('uploader', 'Uploaded By', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('uploader', $user->first_name.' '.$user->last_name, ['placeholder' => 'Uploaded By...', 'class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('doc', 'Document', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::file('image') }}
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="form-group pull-right">
                            {{ Form::submit('Upload File', ['class' => 'btn btn-primary']) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end upload doc-->

        <!-- edit doc-->
        @foreach($docs as $doc)
            <div class="modal fade" style="margin-top:10%" id="{{$doc->id}}" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Edit Documents</h4>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(['url' => '/admin/case/doc/'.$doc->id.'/edit', 'files' => 'true']) !!}
                            {{ csrf_field() }}
                            <div class="form-group" style="display: none; visibility: hidden">
                                {!! Form::text('id', $data->id) !!}
                            </div>
                            <div class="form-group" style="display: none; visibility: hidden">
                                {!! Form::text('doc_id', $doc->id) !!}
                            </div>
                            <div class="form-group row">
                                {{ Form::label('title', 'Title', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('title', $doc->title, ['placeholder' => 'Document title', 'class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('type', 'Type', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::select('type', ['SS' => 'Social Security', 'DL' => 'Driver License'], $doc->type, ['placeholder' => 'Choose document type...', 'class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('description', 'Description', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::textarea('description', $doc->description, ['placeholder' => 'Input document description', 'class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('visible', 'Visible', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::select('visible', ['visible' => 'visible', 'invisible' => 'invisible'], $doc->visible, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('xxx', 'Uploaded By', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('xxx', $user->first_name.' '.$user->last_name, ['placeholder' => 'Uploaded By...', 'class' => 'form-control', 'disabled']) }}
                                </div>
                            </div>
                            <div class="form-group row" style="display: none; visibility: hidden">
                                {{ Form::label('uploader', 'Uploaded By', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('uploader', $user->first_name.' '.$user->last_name, ['placeholder' => 'Uploaded By...', 'class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group pull-right">
                                {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- end edit doc-->

        <!-- delete doc -->
        @foreach($docs as $doc)
            <div class="modal fade" style="margin-top:10%" id="del{{$doc->id}}" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Delete Documents</h4>
                        </div>
                        <div class="modal-body">
                            <div style="padding-left: 130px">
                                <p style="font-size: 20px; color: red">Are you sure to delete {{$doc->title}}?</p>
                                <p><strong>Document information:</strong></p>
                                <p><strong>Title: </strong>{{$doc->title}}</p>
                                <p><strong>Type: </strong>{{$doc->type}}</p>
                                <p><strong>Uploaded By: </strong>{{$doc->uploader}}</p>
                                <p><strong>Last Modified
                                        Date: </strong>{{date("m/d/Y H:i:s", strtotime($doc->updated_at))}}
                                </p>
                                <p><strong>Upload Date: </strong>{{date("m/d/Y H:i:s", strtotime($doc->created_at))}}
                                </p>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                            <a role="button" class="btn btn-danger"
                               href={{ url('/admin/case/doc/'.$doc->id.'/delete') }}>Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- end delete doc-->

        <!-- add work history -->
        <div class="modal fade" style="margin-top:10%" id="addworkhistory" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Work History</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['url' => '/admin/case/workhistory']) !!}
                        {{ csrf_field() }}
                        <div class="form-group" style="display: none; visibility: hidden">
                            {!! Form::text('id', $data->id) !!}
                        </div>
                        <div class="form-group row">
                            {{ Form::label('start_date', 'Start Date', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('start_date', null, ['id' => 'start_date1', 'placeholder' => 'Start date', 'class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('end_date', 'End Date', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('end_date', null, ['id' => 'end_date1', 'placeholder' => 'End date', 'class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('industry', 'Industry', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('industry', null, ['placeholder' => 'Industry name', 'class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('company', 'Company', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('company', null, ['placeholder' => 'Company name', 'class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('companyaddress', 'Company Address', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('companyaddress', null, ['placeholder' => 'Company address', 'class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('stauts', 'Status', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::select('status', ['current' => 'Current', 'past' => 'Past'], null, ['placeholder' => 'Choose status', 'class' => 'form-control']) }}
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <div class="form-group pull-right">
                            {{ Form::submit('Add', ['class' => 'btn btn-primary']) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end add work history -->

        <!-- edit work history-->
        @foreach($workhistorys as $workhistory)
            <div class="modal fade" style="margin-top:10%" id="editworkhistory{{$workhistory->id}}" tabindex="-1"
                 role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Edit Work History</h4>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(['url' => '/admin/case/workhistory/'.$workhistory->id.'/edit']) !!}
                            {{ csrf_field() }}
                            <div class="form-group" style="display: none; visibility: hidden">
                                {!! Form::text('id', $data->id) !!}
                            </div>
                            <div class="form-group row">
                                {{ Form::label('start_date', 'Start Date', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('start_date', $workhistory->start_date, ['id' => 'start_date2', 'placeholder' => 'Start date', 'class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('end_date', 'End Date', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('end_date', $workhistory->end_date, ['id' => 'end_date2', 'placeholder' => 'End date', 'class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('industry', 'Industry', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('industry', $workhistory->industry, ['placeholder' => 'Industry name', 'class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('company', 'Company', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('company', $workhistory->company, ['placeholder' => 'Company name', 'class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('companyaddress', 'Company Address', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('companyaddress', $workhistory->address, ['placeholder' => 'Company address', 'class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('status', 'Status', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::select('status', ['current' => 'Current', 'past' => 'Past'], $workhistory->status, ['placeholder' => 'Choose status', 'class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group pull-right">
                                {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- end edit work history-->

        <!-- view work history-->
        @foreach($workhistorys as $workhistory)
            <div class="modal fade" style="margin-top:10%" id="viewworkhistory{{$workhistory->id}}" tabindex="-1"
                 role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Work History</h4>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(['url' => '/admin/case/workhistory/'.$workhistory->id.'/edit']) !!}
                            {{ csrf_field() }}
                            <div class="form-group" style="display: none; visibility: hidden">
                                {!! Form::text('id', $data->id) !!}
                            </div>
                            <div class="form-group row">
                                {{ Form::label('start_date', 'Start Date', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('start_date', $workhistory->start_date, ['id' => 'start_date2', 'placeholder' => 'Start time', 'class' => 'form-control', 'disabled']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('end_date', 'End Date', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('end_date', $workhistory->end_date, ['id' => 'end_date2', 'placeholder' => 'End time', 'class' => 'form-control', 'disabled']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('industry', 'Industry', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('industry', $workhistory->industry, ['placeholder' => 'Industry name', 'class' => 'form-control', 'disabled']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('company', 'Company', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('company', $workhistory->company, ['placeholder' => 'Company name', 'class' => 'form-control', 'disabled']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('companyaddress', 'Company Address', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('companyaddress', $workhistory->address, ['placeholder' => 'Company name', 'class' => 'form-control', 'disabled']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('status', 'Status', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::select('status', ['current' => 'Current', 'past' => 'Past'], $workhistory->status, ['placeholder' => 'Choose status', 'class' => 'form-control', 'disabled']) }}
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group pull-right">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Exit</button>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- end view work history-->

        <!-- delete work history -->
        @foreach($workhistorys as $workhistory)
            <div class="modal fade" style="margin-top:10%" id="deleteworkhistory{{$workhistory->id}}" tabindex="-1"
                 role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Delete Work History</h4>
                        </div>
                        <div class="modal-body">
                            <div style="padding-left: 130px">
                                <p style="font-size: 20px; color: red">Are you sure to delete ?</p>
                                <p><strong>Please confirm work history:</strong></p>
                                <p><strong>Start date: </strong>{{$workhistory->start_date}}</p>
                                <p><strong>End date: </strong>{{$workhistory->end_date}}</p>
                                <p><strong>Company: </strong>{{$workhistory->company}}</p>
                                <p><strong>Industry: </strong>{{$workhistory->industry}}</p>
                                <p><strong>Last Modify
                                        date: </strong>{{date("m/d/Y H:i:s", strtotime($workhistory->updated_at))}}</p>
                                <p><strong>Created
                                        date: </strong>{{date("m/d/Y H:i:s", strtotime($workhistory->created_at))}}</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                            <a role="button" class="btn btn-danger"
                               href={{ url('/admin/case/workhistory/'.$workhistory->id.'/delete') }}>Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- end delete work history-->

        <!-- add edu history -->
        <div class="modal fade" style="margin-top:10%" id="addeduhistory" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Education History</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['url' => '/admin/case/eduhistory']) !!}
                        {{ csrf_field() }}
                        <div class="form-group" style="display: none; visibility: hidden">
                            {!! Form::text('id', $data->id) !!}
                        </div>
                        <div class="form-group row">
                            {{ Form::label('start_date', 'Start Date', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('start_date', null, ['id' => 'start_date_edu1', 'placeholder' => 'Start date', 'class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('end_date', 'End Date', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('end_date', null, ['id' => 'end_date_edu1', 'placeholder' => 'End date', 'class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('school', 'School', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('school', null, ['placeholder' => 'School name', 'class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('level', 'Level', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('level', null, ['placeholder' => 'Level', 'class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('schooladdress', 'School Address', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('schooladdress', null, ['placeholder' => 'School address', 'class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('stauts', 'Status', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::select('status', ['current' => 'Current', 'past' => 'Past'], null, ['placeholder' => 'Choose status', 'class' => 'form-control']) }}
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <div class="form-group pull-right">
                            {{ Form::submit('Add', ['class' => 'btn btn-primary']) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end add edu history -->

        <!-- edit edu history-->
        @foreach($eduhistorys as $eduhistory)
            <div class="modal fade" style="margin-top:10%" id="editeduhistory{{$eduhistory->id}}" tabindex="-1"
                 role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Edit Educatioon History</h4>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(['url' => '/admin/case/eduhistory/'.$eduhistory->id.'/edit']) !!}
                            {{ csrf_field() }}
                            <div class="form-group" style="display: none; visibility: hidden">
                                {!! Form::text('id', $data->id) !!}
                            </div>
                            <div class="form-group row">
                                {{ Form::label('start_date', 'Start Date', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('start_date', $eduhistory->start_date, ['id' => 'start_date_edu2', 'placeholder' => 'Start date', 'class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('end_date', 'End Date', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('end_date', $eduhistory->end_date, ['id' => 'end_date_edu2', 'placeholder' => 'End date', 'class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('school', 'School', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('school', $eduhistory->school, ['placeholder' => 'School name', 'class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('level', 'Level', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('level', $eduhistory->level, ['placeholder' => 'Level', 'class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('schooladdress', 'School Address', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('schooladdress', $eduhistory->address, ['placeholder' => 'School address', 'class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('status', 'Status', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::select('status', ['current' => 'Current', 'past' => 'Past'], $eduhistory->status, ['placeholder' => 'Choose status', 'class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group pull-right">
                                {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- end edit edu history-->

        <!-- view edu history-->
        @foreach($eduhistorys as $eduhistory)
            <div class="modal fade" style="margin-top:10%" id="vieweduhistory{{$eduhistory->id}}" tabindex="-1"
                 role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Education History</h4>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(['url' => '/admin/case/eduhistory/'.$eduhistory->id.'/edit']) !!}
                            {{ csrf_field() }}
                            <div class="form-group" style="display: none; visibility: hidden">
                                {!! Form::text('id', $data->id) !!}
                            </div>
                            <div class="form-group row">
                                {{ Form::label('start_date', 'Start Date', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('start_date', $eduhistory->start_date, ['id' => 'start_date_edu2', 'placeholder' => 'Start date', 'class' => 'form-control', 'disabled']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('end_date', 'End Date', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('end_date', $eduhistory->end_date, ['id' => 'end_date_edu2', 'placeholder' => 'End date', 'class' => 'form-control', 'disabled']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('school', 'School', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('school', $eduhistory->school, ['placeholder' => 'School name', 'class' => 'form-control', 'disabled']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('level', 'Level', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('level', $eduhistory->level, ['placeholder' => 'Level', 'class' => 'form-control', 'disabled']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('schooladdress', 'School Address', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('schooladdress', $eduhistory->address, ['placeholder' => 'School address', 'class' => 'form-control', 'disabled']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('status', 'Status', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::select('status', ['current' => 'Current', 'past' => 'Past'], $eduhistory->status, ['placeholder' => 'Choose status', 'class' => 'form-control', 'disabled']) }}
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group pull-right">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Exit</button>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- end view edu history-->

        <!-- delete edu history -->
        @foreach($eduhistorys as $eduhistory)
            <div class="modal fade" style="margin-top:10%" id="deleteeduhistory{{$eduhistory->id}}" tabindex="-1"
                 role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Delete Education History</h4>
                        </div>
                        <div class="modal-body">
                            <div style="padding-left: 130px">
                                <p style="font-size: 20px; color: red">Are you sure to delete ?</p>
                                <p><strong>Please confirm education history:</strong></p>
                                <p><strong>Start date: </strong>{{$eduhistory->start_date}}</p>
                                <p><strong>End date: </strong>{{$eduhistory->end_date}}</p>
                                <p><strong>School: </strong>{{$eduhistory->school}}</p>
                                <p><strong>Level: </strong>{{$eduhistory->level}}</p>
                                <p><strong>Last Modify
                                        date: </strong>{{date("m/d/Y H:i:s", strtotime($eduhistory->updated_at))}}</p>
                                <p><strong>Created
                                        date: </strong>{{date("m/d/Y H:i:s", strtotime($eduhistory->created_at))}}</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                            <a role="button" class="btn btn-danger"
                               href={{ url('/admin/case/eduhistory/'.$eduhistory->id.'/delete') }}>Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- end delete edu history-->



        <!-- add additional contact -->
        <div class="modal fade" style="margin-top:10%" id="addcontact" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="">Additional Contact</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['url' => '/admin/case/addcontacts']) !!}
                        {{ csrf_field() }}
                        <div class="form-group" style="display: none; visibility: hidden">
                            {!! Form::text('id', $data->id) !!}
                        </div>
                        <div class="form-group row">
                            {{ Form::label('name', 'Name', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('name', null, ['placeholder' => 'Firstname Lastname', 'class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('relationship', 'Relationship', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('relationship', null, ['placeholder' => 'Relationship', 'class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('phone', 'Phone', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('phone', null, ['placeholder' => '+1 213 XXXXXXX', 'class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('email', 'Email', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('email', null, ['placeholder' => 'xxxx@gmail.com', 'class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('address', 'Address', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('address', null, ['placeholder' => 'Resident address', 'class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('stauts', 'Status', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('status', null, ['placeholder' => 'Choose status', 'class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group pull-right">
                            {{ Form::submit('Add', ['class' => 'btn btn-primary']) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end add additional contact-->

        <!-- view additional contact-->
        @foreach($addcontacts as $addcontact)
            <div class="modal fade" style="margin-top:10%" id="viewaddcontact{{$addcontact->id}}" tabindex="-1"
                 role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="">Additional Contact</h4>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(['url' => '/admin/case/addcontacts']) !!}
                            {{ csrf_field() }}
                            <div class="form-group" style="display: none; visibility: hidden">
                                {!! Form::text('id', $data->id) !!}
                            </div>

                            <div class="form-group row">
                                {{ Form::label('name', 'Name', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('name', $addcontact->name, ['class' => 'form-control', 'disabled']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('relationship', 'Relationship', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('relationship', $addcontact->relationship, ['class' => 'form-control', 'disabled']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('phone', 'Phone', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('phone', $addcontact->phone, ['class' => 'form-control', 'disabled']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('email', 'Email', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('email', $addcontact->email, ['class' => 'form-control', 'disabled']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('address', 'Address', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('address', $addcontact->address, ['class' => 'form-control', 'disabled']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('stauts', 'Status', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('status', $addcontact->status, ['class' => 'form-control', 'disabled']) }}
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group pull-right">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Exit</button>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- end view additional contact-->

        <!-- edit additional contact-->
        @foreach($addcontacts as $addcontact)
            <div class="modal fade" style="margin-top:10%" id="editaddcontact{{$addcontact->id}}" tabindex="-1"
                 role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="">Additional Contact</h4>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(['url' => '/admin/case/addcontacts/'.$addcontact->id.'/edit']) !!}
                            {{ csrf_field() }}
                            <div class="form-group" style="display: none; visibility: hidden">
                                {!! Form::text('id', $data->id) !!}
                            </div>
                            <div class="form-group row">
                                {{ Form::label('name', 'Name', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('name', $addcontact->name, ['placeholder' => 'Firstname Lastname', 'class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('relationship', 'Relationship', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('relationship', $addcontact->relationship, ['placeholder' => 'Relationship', 'class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('phone', 'Phone', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('phone', $addcontact->phone, ['placeholder' => '+1 213 XXXXXXX', 'class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('email', 'Email', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('email', $addcontact->email, ['placeholder' => 'xxxx@gmail.com', 'class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('address', 'Address', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('address', $addcontact->address, ['placeholder' => 'Resident address', 'class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('stauts', 'Status', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                                <div class="col-md-10">
                                    {{ Form::text('status', $addcontact->status, ['placeholder' => 'Choose status', 'class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group pull-right">
                                {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- end edit additional contact-->


        <!-- delete additional contact -->
        @foreach($addcontacts as $addcontact)
            <div class="modal fade" style="margin-top:10%" id="deleteaddcontact{{$addcontact->id}}" tabindex="-1"
                 role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Delete Education History</h4>
                        </div>
                        <div class="modal-body">
                            <div style="padding-left: 130px">
                                <p style="font-size: 20px; color: red">Are you sure to delete ?</p>
                                <p><strong>Please confirm additonal contact:</strong></p>
                                <p><strong>Name: </strong>{{$addcontact->name}}</p>
                                <p><strong>Relationship: </strong>{{$addcontact->relationship}}</p>
                                <p><strong>Phone: </strong>{{$addcontact->phone}}</p>
                                <p><strong>Email: </strong>{{$addcontact->email}}</p>
                                <p><strong>Address: </strong>{{$addcontact->address}}</p>
                                <p><strong>Status: </strong>{{$addcontact->status}}</p>
                                <p><strong>Last Modify
                                        date: </strong>{{date("m/d/Y H:i:s", strtotime($addcontact->updated_at))}}</p>
                                <p><strong>Created
                                        date: </strong>{{date("m/d/Y H:i:s", strtotime($addcontact->created_at))}}</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                            <a role="button" class="btn btn-danger"
                               href={{ url('/admin/case/addcontacts/'.$addcontact->id.'/delete') }}>Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- end delete additional contact-->




        <!-- edit profile -->
        <div class="modal fade" style="margin-top:10%" id="editProfile" tabindex="-1"
             role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['url' => 'admin/case/'.$data->id.'/edit']) !!}
                        <div class="form-group" style="display: none; visibility: hidden">
                            {!! Form::text('id', $data->id) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Email') !!}
                            <input type="text" class="form-control" value="{{ $data->email }}" disabled>
                            <a href="#" class="help-block">Want to change email ?</a>
                        </div>
                        <div class="form-group">
                            {!! Form::label('First Name*') !!}
                            {!! Form::text('first_name', $data->first_name, ['placeholder' => 'First name', 'required' => 'required', 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Last Name*') !!}
                            {!! Form::text('last_name', $data->last_name, ['placeholder' => 'Last name', 'required' => 'required', 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Date of Birth') !!}
                            {!! Form::text('birthday', date('m/d/Y', strtotime($data->birthday)), ['id' => 'birthday_edit', 'placeholder' => 'mm/dd/yyyy', 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Gender') !!}
                            {!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female', 'N/A' => 'Decline to State'], $data->gender, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Web Page') !!}
                            {!! Form::text('webpage', $data->webpage, ['Placeholder' => 'Web Page', 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('SSN') !!}
                            {!! Form::text('ssn', $data->ssn, ['Placeholder' => 'AAA-GG-SSSS', 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('ILP') !!}
                            {!! Form::select('ilp', ['1' => 'Yes', '0' => 'No'], null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Ethnicity') !!}
                            {!! Form::select('ethnicity', ['Asian' => 'Asian', 'African American' => 'African American', 'Caucasian' => 'Caucasian', 'Latino' => 'Latino', 'Multiracial' => 'Multiracial', 'Native American' => 'Native American'], $data->ethnicity, ['placeholder' => 'Choose your ethnicity...', 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Program') !!}
                            {!! Form::select('program', ['Program1' => 'Program1'], $data->program, ['placeholder' => 'Choose your program...', 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Case Manager') !!}
                            {!! Form::select('cm_name', $all_list, null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group pull-right">
                            {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end edit profile -->

        <!-- add contact information -->
        <div class="modal fade" style="margin-top:10%" id="addaddress" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="">Add Address</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['url' => '/admin/case/addaddress']) !!}
                        {{ csrf_field() }}
                        <div class="form-group" style="display: none; visibility: hidden">
                            {!! Form::text('id', $data->id) !!}
                        </div>
                        <div class="form-group row">
                            {{ Form::label('address', 'Address', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('address', null, ['placeholder' => 'Address', 'class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('city', 'City', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('city', null, ['placeholder' => 'Relationship', 'class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('state', 'State', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {!! Form::select('state', ['N/A'=>'--',
                    'AL' => 'AL', 'AK' => 'AK', 'AZ' => 'AZ', 'AR' => 'AR', 'CA' => 'CA',
                    'CO' => 'CO', 'CT' => 'CT', 'DE' => 'DE', 'DC' => 'DC', 'FL' => 'FL',
                    'GA' => 'GA', 'HI' => 'HI', 'ID' => 'ID', 'IL' => 'IL', 'IN' => 'IN',
                    'IA' => 'IA', 'KS' => 'KS', 'KY' => 'KY', 'LA' => 'LA', 'ME' => 'ME',
                    'MD' => 'MD', 'MA' => 'MA', 'MI' => 'MI', 'MN' => 'MN', 'MS' => 'MS',
                    'MO' => 'MO', 'MT' => 'MT', 'NE' => 'NE', 'NV' => 'NV', 'NH' => 'NH',
                    'NJ' => 'NJ', 'NM' => 'NM', 'NY' => 'NY', 'NC' => 'NC', 'ND' => 'ND',
                    'OH' => 'OH', 'OK' => 'OK', 'OR' => 'OR', 'PA' => 'PA', 'RI' => 'RI',
                    'SC' => 'SC', 'SD' => 'SD', 'TN' => 'TN', 'TX' => 'TX', 'UT' => 'UT',
                    'VT' => 'VT', 'VA' => 'VA', 'WA' => 'WA', 'WV' => 'WV', 'WI' => 'WI',
                    'WY' => 'WY'], null, ['placeholder' => 'Choose state code...','class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('zipcode', 'Zip', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('zipcode', null, ['placeholder' => '90000', 'class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('email', 'Email', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('email', null, ['placeholder' => 'xxxx@gmail.com', 'class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('status', 'Status', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('status', null, ['placeholder' => 'Input status', 'class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group pull-right">
                            {{ Form::submit('Add', ['class' => 'btn btn-primary']) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" style="margin-top:10%" id="addphone" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="">Add Phone</h4>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" style="margin-top:10%" id="addemail" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="">Add Email</h4>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
        <!-- end add contact information-->
    @elseif($user->inRole($manager))
        Manager
    @elseif($user->inRole($staff))
        Staff
    @endif

@endsection