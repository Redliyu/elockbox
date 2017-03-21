@extends('layouts.dashboard')

@section('head')
    <link href="{{ asset('cssnew/datepicker/jquery-ui.css') }}" rel="stylesheet">
    <script src="{{ asset('cssnew/datepicker/js/jquery-3.1.1.js') }}"></script>
    <script src="{{ asset('cssnew/datepicker/jquery-ui.js') }}"></script>
    <script>
        function edit() {
            document.getElementById("view").style.display = "none";
            document.getElementById("view").style.visibility = "hidden";
            document.getElementById("edit").style.display = "block";
            document.getElementById("edit").style.visibility = "visible";
        }
        $(document).ready(function () {
            $('#phone').blur(function () {
                if(document.getElementById('phone').value.length != 12) {
                    $('#cphone').fadeIn();
                } else {
                    $('#cphone').fadeOut();
                }
            });
        });
        function check_input(form) {
            if((form.phone.value.length != 0) && (form.phone.value.length != 12)) {
                return false;
            } else {
                return true;
            }
        }
        function format_phone(phone) {
            var re = /^[(]?(\d{3})[)]?[-/.]?(\d{3})[-/.]?(\d{4})$/;
            var newstr = phone.replace(re, '$1-$2-$3');
            document.getElementById('phone').value = newstr;
        }
    </script>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text"></i>Profile</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{ url('login') }}">Home</a></li>
                <li><i class="fa fa-folder-open"></i><a href="{{ url('admin/user/view') }}">User Management</a></li>
                <li><i class="fa fa-list"></i><a href="{{ url('admin/user/view') }}">View Users</a></li>
                <li><i class="fa fa-file-text"></i><a href="{{ url('admin/user/'.$user->id.'/view') }}">{{$user->first_name.' '.$user->last_name}}</a></li>
            </ol>
        </div>
    </div>

    <div class="row profile" id="view">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    {{--Avatar--}}
                    <div class="col-md-4" style="margin-top: 20px">
                        <div class="text-center">
                            <img class="img-profile" src="{{ asset('cssnew/assets/img/avatar.jpg') }}">
                        </div>
                        <h3 class="text-center"><strong>{{ $user->first_name.' '.$user->last_name }}</strong></h3>
                        <h5 class="text-center" style="color: #686868"><strong><em>{{ $role }}</em></strong></h5>
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
                                            Email</strong>
                                    </div>
                                    <div style="color: #6699CC">
                                        @if($user->email)
                                            {{ $user->email }}
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
                                                                   style="color: #4C4F53"></i><strong>
                                            Phone</strong>
                                    </div>
                                    <div style="color: #6699CC">
                                        @if($profile->phone_number)
                                            {{ $profile->phone_number }}
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
                                                                   style="color: #4C4F53"></i><strong>
                                            Status</strong>
                                    </div>
                                    <div style="color: #6699CC">
                                        {{$status}}
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <ul class="profile-details">
                                <li>
                                    <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                                   style="color: #4C4F53"></i><strong>
                                            Address</strong>
                                    </div>
                                    <div style="color: #6699CC">
                                        @if($profile->address1)
                                            {{ $profile->address1.' '.$profile->address2.', '.$profile->city.', '.$profile->state.', '.$profile->zip }}
                                        @else
                                            N/A
                                        @endif
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-12" style="margin-top: 13px">
                            <div class="row">
                                <div class="col-md-6">
                                    <button id="profile_edit" type="button" class="btn btn-block btn-primary"
                                            onclick="edit()">
                                        Edit
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    @if($status == "Active")
                                        <a href="{{ url('admin/user/'.$user->id.'/inactive') }}"
                                           class="btn btn-block btn-warning"
                                           role="button" id="case_inactive">Inactive</a>
                                    @elseif($status == "Inactive")
                                        <a href="{{ url('admin/user/'.$user->id.'/active') }}"
                                           class="btn btn-block btn-success"
                                           role="button" id="case_inactive">Active</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row profile" id="edit" style="display: none; visibility: hidden">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    {{--Avatar--}}
                    <div class="col-md-4" style="margin-top: 20px">
                        <div class="text-center">
                            <img class="img-profile" src="{{ asset('cssnew/assets/img/avatar.jpg') }}">
                        </div>
                        <h3 class="text-center"><strong>{{ $user->first_name.' '.$user->last_name }}</strong></h3>
                        <h5 class="text-center" style="color: #686868"><strong><em>{{ $role }}</em></strong></h5>
                        <hr>
                        <div class="text-center">
                            <li><a href="#" class="fa fa-facebook facebook-bg"></a></li>
                            <li><a href="#" class="fa fa-twitter twitter-bg"></a></li>
                            <li><a href="#" class="fa fa-linkedin linkedin-bg"></a></li>
                        </div>
                        <hr>
                        <h4><strong>General Information</strong></h4>
                        <ul class="profile-details">
                            <li>
                                <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                               style="color: #4C4F53"></i><strong>
                                        Email</strong>
                                </div>
                                <div style="color: #6699CC">
                                    @if($user->email)
                                        {{ $user->email }}
                                    @else
                                        N/A
                                    @endif
                                </div>
                            </li>
                        </ul>
                        <ul class="profile-details">
                            <li>
                                <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                               style="color: #4C4F53"></i><strong>
                                        Phone</strong>
                                </div>
                                <div style="color: #6699CC">
                                    @if($profile->phone_number)
                                        {{ $profile->phone_number }}
                                    @else
                                        N/A
                                    @endif
                                </div>
                            </li>
                        </ul>
                        <ul class="profile-details">
                            <li>
                                <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                               style="color: #4C4F53"></i><strong>
                                        Address</strong>
                                </div>
                                <div style="color: #6699CC">
                                    @if($profile->address1)
                                        {{ $profile->address1.' '.$profile->address2.', '.$profile->city.', '.$profile->state.', '.$profile->zip }}
                                    @else
                                        N/A
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </div>
                    {{-- Edit profile--}}
                    <div class="col-md-8" style="margin-top: 20px">
                        {!! Form::open(['url' => 'admin/user/'.$user->id.'/edit', 'onsubmit' => 'return check_input(this)']) !!}
                        <div class="form-group">
                            {!! Form::label('Email*') !!}
                            {!! Form::email('email', $user->email, ['placeholder' => 'First name', 'required' => 'required', 'class' => 'form-control', 'disabled']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('first_name','First Name', ['class' => 'col-form-label control-label', 'style' => 'padding-top:7px']) !!}
                            {!! Form::text('first_name', $user->first_name, ['placeholder' => 'First name', 'required' => 'required', 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('last_name', 'Last Name', ['class' => 'col-form-label control-label', 'style' => 'padding-top:7px']) !!}
                            {!! Form::text('last_name', $user->last_name, ['placeholder' => 'Last name', 'required' => 'required', 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('phone_number', 'Phone', ['class' => 'col-form-label control-label', 'style' => 'padding-top:7px']) !!}
                            {!! Form::text('phone_number', $profile->phone_number, ['id' => 'phone', 'placeholder' => 'e.g. 123-456-7890', 'class' => 'form-control', 'onkeyup' => 'format_phone(this.value)', 'autocomplete' => 'off']) !!}
                            <div id="cphone" style="display: none; color: red;" class="col-md-12">
                                <p>Phone should have 10 digits, format is XXX-XXX-XXXX.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('address1', 'Address1', ['class' => 'col-form-label control-label', 'style' => 'padding-top:7px']) !!}
                            {!! Form::text('address1', $profile->address1, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('address2', 'Address2', ['class' => 'col-form-label control-label', 'style' => 'padding-top:7px']) !!}
                            {!! Form::text('address2', $profile->address2, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('city', 'City', ['class' => 'col-form-label control-label', 'style' => 'padding-top:7px']) !!}
                            {!! Form::text('city', $profile->city, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('state', 'State', ['class' => 'col-form-label control-label', 'style' => 'padding-top:7px']) !!}
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
                            'WY' => 'WY'], $profile->state, ['placeholder' => 'Choose state code...','class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('zip', 'ZIP', ['class' => 'col-form-label control-label', 'style' => 'padding-top:7px']) !!}
                            {!! Form::text('zip', $profile->zip, ['placeholder' => '90000', 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('role', 'Level*', ['class' => 'col-form-label control-label', 'style' => 'padding-top:7px']) !!}
                            {!! Form::select('role', ['Admins' => 'Admin', 'Managers' => 'Case Manager', 'Staff' => 'Staff', 'Youths' => 'Youth'], $editrole, ['placeholder' => 'Choose user type...', 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group pull-right">
                            <a type="button" class="btn btn-default" href="{{ url('admin/user/'.$user->id.'/view') }}">Cancel</a>
                            {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                            {{ Form::close() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection