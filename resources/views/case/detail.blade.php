@extends('layouts.dashboard')

@section('content')

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

    <div class="row profile">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        <img class="img-profile" src="{{ asset('cssnew/assets/img/avatar.jpg') }}">
                    </div>
                    <h3 class="text-center"><strong>{{ $data->last_name }}, {{ $data->first_name }}</strong></h3>
                    <button type="button" class="btn btn-block btn-success center-block" style="width: 15%"
                            data-toggle="modal" data-target="#createAccount">
                        Create Account
                    </button>
                    <h4 class="text-center">
                        <small><i class="fa fa-map-marker"></i> California, USA</small>
                    </h4>

                    <hr>

                    <div class="text-center">
                        <li><a href="#" class="fa fa-facebook facebook-bg"></a></li>
                        <li><a href="#" class="fa fa-twitter twitter-bg"></a></li>
                        <li><a href="#" class="fa fa-linkedin linkedin-bg"></a></li>
                    </div>

                    <hr>
                    <div class="col-md-12">
                        <h4><strong>General Information</strong></h4>
                        <div class="col-md-4">
                            <ul class="profile-details">
                                <li>
                                    <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                                   style="color: #4C4F53"></i><strong> Gender</strong>
                                    </div>
                                    <div style="color: #6699CC"> {{ $data->gender }}</div>
                                </li>
                                <li>
                                    <div style="color: #4C4F53"><i class="fa fa-calendar"
                                                                   style="color: #4C4F53"></i><strong> Birthday</strong>
                                    </div>
                                    <div style="color: #6699CC">{{ $data->birthday }}</div>
                                </li>
                                <li>
                                    <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                                   style="color: #4C4F53"></i><strong> Webpage</strong>
                                    </div>
                                    <div style="color: #6699CC">{{ $data->webpage }}</div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="profile-details">
                                <li>
                                    <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                                   style="color: #4C4F53"></i><strong> Social Security
                                            Number</strong></div>
                                    <div style="color: #6699CC">{{ $data->ssn }}</div>
                                </li>
                                <li>
                                    <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                                   style="color: #4C4F53"></i><strong> Status</strong>
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
                                    <div style="color: #6699CC">{{ $data->ethnicity }}</div>
                                </li>
                                <li>
                                    <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                                   style="color: #4C4F53"></i><strong> Program</strong>
                                    </div>
                                    <div style="color: #6699CC">{{ $data->program }}</div>
                                </li>
                                <li>
                                    <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                                   style="color: #4C4F53"></i><strong> Manager</strong>
                                    </div>
                                    <div style="color: #6699CC">BLANK
                                        <div style="color: #6699CC">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <h4><strong>Contact Information</strong></h4>

                        <ul class="profile-details">
                            <li>
                                <div><i class="fa fa-phone"></i> Phone</div>
                                +25 2569 256
                            </li>
                            <li>
                                <div><i class="fa fa-tablet"></i> Mobile</div>
                                +62 2569 2568 256
                            </li>
                            <li>
                                <div><i class="fa fa-envelope"></i> E-mail</div>
                                jhonsmith@mail.com
                            </li>
                            <li>
                                <div><i class="fa fa-map-marker"></i> address</div>
                                Blackstreet No. 256<br/>
                                1256 California, USA<br/>
                            </li>
                        </ul>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{ url('admin/case/'.$data->id.'/edit') }}" class="btn btn-block btn-primary"
                                   role="button">Edit</a>
                            </div>
                            @if($data->status)
                                <div class="col-md-4">
                                    <a href="{{ url('admin/case/'. $data->id.'/inactive') }}"
                                       class="btn btn-block btn-warning"
                                       role="button">Inactive</a>
                                </div>
                            @else
                                <div class="col-md-4">
                                    <a href="{{ url('admin/case/'. $data->id.'/active') }}"
                                       class="btn btn-block btn-success"
                                       role="button">Active</a>
                                </div>
                            @endif
                            <div class="col-md-4">
                                <a href="{{ url('admin/case/'.$data->id.'/delete') }}" class="btn btn-block btn-danger"
                                   role="button">Delete</a>
                            </div>
                        </div>
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
@endsection