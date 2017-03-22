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
                    $staff = Sentinel::findRoleByName('staffs');
                    $manager = Sentinel::findRoleByName('Managers');
                    $staff = Sentinel::findRoleByName('Staff');
                    $youth = Sentinel::findRoleByName('Youths');
                } ?>
                @if($user->inRole($staff))
                    <li><i class="fa fa-list"></i><a href="{{ url('/staff/case/view') }}">View Cases</a></li>
                @elseif($user->inRole($manager))
                    <li><i class="fa fa-list"></i><a href="#">View Cases</a></li>
                @elseif($user->inRole($staff))
                    <li><i class="fa fa-list"></i><a href="#">View Cases</a></li>
                @endif
                <li><i class="fa fa-file-text"></i>Profile</li>
            </ol>
        </div>
    </div>

    <div class="row profile">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    {{--Avatar--}}
                    <div class="col-md-4" style="margin-top: 20px">
                        <div class="text-center">
                            <img class="img-profile" src="{{ asset('cssnew/assets/img/avatar.png') }}">
                        </div>
                        <h3 class="text-center"><strong>{{ $data->first_name.' '.$data->last_name }}</strong></h3>
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
                                            {{ $program_name[$data->program] }}
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
                    </div>
                    {{--Contact Information--}}
                    <div class="col-md-12"
                         style="border-top: 1px #EEEEEE solid; margin-top: 15px; padding-top: 10px">
                        <h4><strong>Contact Information</strong></h4>
                        <div class="col-md-12" style="">
                            <div class="col-md-10">
                                <h5><strong>Address</strong></h5>
                            </div>
                            <table class="table table-striped" style="margin-left: 15px">
                                <thead>
                                <tr>
                                    <th style="width: 28%;">Address</th>
                                    <th style="width: 14%;">City</th>
                                    <th style="width: 14%;">State</th>
                                    <th style="width: 14%;">ZipCode</th>
                                    <th style="width: 14%;">Status</th>
                                    @if($data->status)
                                        <th style="width: 14%;">Action</th>
                                    @endif
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
                                        @if($data->status)
                                            <td>
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                        data-target="#viewaddress{{$address->id}}">
                                                    <i class="fa fa-search-plus" style="width: 10px"></i>
                                                </button>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12" style="">
                            <div class="col-md-10">
                                <h5><strong>Phone</strong></h5>
                            </div>
                            <table class="table table-striped" style="margin-left: 15px">
                                <thead>
                                <tr>
                                    <th style="width: 14%;">Type</th>
                                    <th style="width: 28%;">Number</th>
                                    <th style="width: 42%;">Status</th>
                                    @if($data->status)
                                        <th style="width: 14%;">Action</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($case_phone as $phone)
                                    <tr>
                                        <td>{{$phone->type}}</td>
                                        <td>{{$phone->number}}</td>
                                        <td>{{$phone->status}}</td>
                                        @if($data->status)
                                            <td>
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                        data-target="#viewphone{{$phone->id}}">
                                                    <i class="fa fa-search-plus" style="width: 10px"></i>
                                                </button>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12" style="">
                            <div class="col-md-10">
                                <h5><strong>Email</strong></h5>
                            </div>
                            <table class="table table-striped" style="margin-left: 15px">
                                <thead>
                                <tr>
                                    <th style="width: 42%;">Email</th>
                                    <th style="width: 42%;">Status</th>
                                    <th style="width: 14%;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($case_email as $email)
                                    <tr>
                                        <td>{{$email->email}}</td>
                                        <td>{{$email->status}}</td>
                                        @if($data->status)
                                            <td>
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                        data-target="#viewemail{{$email->id}}">
                                                    <i class="fa fa-search-plus" style="width: 10px"></i>
                                                </button>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
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
                                                    data-target="#viewaddcontact{{$addcontact->id}}">
                                                <i class="fa fa-search-plus" style="width: 10px"></i>
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
                        <table class="table table-striped">
                            <thead>
                            <tr style="text-align: left">
                                <th style="width: 14%;">Type</th>
                                <th style="width: 14%;">Title</th>
                                <th style="width: 14%;">Uploaded By</th>
                                <th style="width: 21%;">Upload Date</th>
                                <th style="width: 21%;">Last Modified Date</th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($docs as $doc)
                                <tr>
                                    <td>{{ $doc_type_abbr[$doc->type] }}</td>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top"
                                           title="{{$doc->description}}">{{$doc->title}}</a></td>
                                    <td>{{$doc->uploader}}</td>
                                    <td>{{date("m/d/Y H:i:s", strtotime($doc->created_at))}}</td>
                                    <td>{{date("m/d/Y H:i:s", strtotime($doc->updated_at))}}</td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div><!--/.col-->
    </div><!--/.row profile-->

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
                        {!! Form::open(['url' => '/staff/case/workhistory/'.$workhistory->id.'/edit']) !!}
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
                                {{ Form::text('status', $workhistory->status, ['placeholder' => 'Choose status', 'class' => 'form-control', 'disabled']) }}
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
                        {!! Form::open(['url' => '/staff/case/eduhistory/'.$eduhistory->id.'/edit']) !!}
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
                                {{ Form::text('status', $eduhistory->status, ['placeholder' => 'Choose status', 'class' => 'form-control', 'disabled']) }}
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
                        {!! Form::open(['url' => '/staff/case/addcontacts']) !!}
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

    <!-- view contact information -->
    <!-- address -->
    @foreach($case_address as $address)
        <div class="modal fade" style="margin-top:10%" id="viewaddress{{$address->id}}" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="">Address Information</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['url' => '/staff/case/contact/address/'.$address->id.'/edit']) !!}
                        {{ csrf_field() }}
                        <div class="form-group row">
                            {{ Form::label('address', 'Address', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('address', $address->address, ['placeholder' => 'Address', 'class' => 'form-control', 'disabled']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('city', 'City', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('city', $address->city, ['placeholder' => 'Relationship', 'class' => 'form-control', 'disabled']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('state', 'State', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {!! Form::text('state', $address->state, ['placeholder' => 'Choose state code...','class' => 'form-control', 'disabled']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('zipcode', 'Zip', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('zipcode', $address->zipcode, ['placeholder' => '90000', 'class' => 'form-control', 'disabled']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('status', 'Status', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('status', $address->status, ['placeholder' => 'Input status', 'class' => 'form-control', 'disabled']) }}
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
    <!-- phone -->
    @foreach($case_phone as $phone)
        <div class="modal fade" style="margin-top:10%" id="viewphone{{$phone->id}}" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="">Edit Phone</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['url' => '/staff/case/contact/phone/'.$phone->id.'/edit']) !!}
                        {{ csrf_field() }}
                        <div class="form-group row">
                            {{ Form::label('number', 'Number', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('number', $phone->number, ['placeholder' => 'Phone Number', 'class' => 'form-control', 'disabled']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('type', 'Type', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('type', $phone->type, ['placeholder' => 'Type', 'class' => 'form-control', 'disabled']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('status', 'Status', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('status', $phone->status, ['placeholder' => 'Input status', 'class' => 'form-control', 'disabled']) }}
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
    <!-- email -->
    @foreach($case_email as $email)
        <div class="modal fade" style="margin-top:10%" id="viewemail{{$email->id}}" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="">Edit Email</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['url' => '/staff/case/contact/email/'.$email->id.'/edit']) !!}
                        {{ csrf_field() }}
                        <div class="form-group row">
                            {{ Form::label('email', 'Email', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('email', $email->email, ['placeholder' => 'Email', 'class' => 'form-control', 'disabled']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('status', 'Status', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px; text-align: right']) }}
                            <div class="col-md-10">
                                {{ Form::text('status', $email->status, ['placeholder' => 'Input status', 'class' => 'form-control', 'disabled']) }}
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
    <!-- end view contact information -->

@endsection