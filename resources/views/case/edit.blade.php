@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-pencil-square"></i> Edit Cases</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{ url('login') }}">Home</a></li>
                <li><i class="fa fa-folder-open"></i>Case Management</li>
                <li><i class="fa fa-pencil-square"></i>Edit Cases</li>
            </ol>
        </div>
    </div>

    <div class="row profile">

        <div class="col-md-5">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        <img class="img-profile" src="{{ asset('cssnew/assets/img/avatar.jpg') }}">
                    </div>

                    <h3 class="text-center"><strong>Jhon Smith</strong></h3>
                    <h4 class="text-center">
                        <small><i class="fa fa-map-marker"></i> California, USA</small>
                    </h4>

                    <hr>

                    <div class="text-center">
                        <li><a href="" class="fa fa-facebook facebook-bg"></a></li>
                        <li><a href="" class="fa fa-twitter twitter-bg"></a></li>
                        <li><a href="" class="fa fa-linkedin linkedin-bg"></a></li>
                    </div>


                    <hr>

                    <div class="row text-center">
                        <div class="col-xs-4">
                            <div><strong>1.256</strong></div>
                            <div>
                                <small>Followers</small>
                            </div>
                        </div><!--/.col-->
                        <div class="col-xs-4">
                            <div><strong>2.568</strong></div>
                            <div>
                                <small>Following</small>
                            </div>
                        </div><!--/.col-->
                        <div class="col-xs-4">
                            <div><strong>25.265</strong></div>
                            <div>
                                <small>Posts</small>
                            </div>
                        </div><!--/.col-->
                    </div><!--/.row-->

                    <hr>

                    <h4><strong>General Information</strong></h4>

                    <ul class="profile-details">
                        <li>
                            <div><i class="fa fa-thumbs-up"></i> Position</div>
                            Administrator
                        </li>
                        <li>
                            <div><i class="fa fa-building-o"></i> Company</div>
                            AdminTemplate Inc.
                        </li>
                    </ul>

                    <hr>

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

            </div>

        </div><!--/.col-->

        <div class="col-md-7">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h2><i class="fa fa-heart-o red"></i><strong>Update info</strong></h2>
                </div>
                <div class="panel-body">
                    {!! Form::open(['route' => ['update', $data->id]]) !!}
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
                        {!! Form::text('birthday', $data->birthday, ['placeholder' => 'yyyy-mm-dd', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Gender') !!}
                        {!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other'], $data->gender, ['class' => 'form-control']) !!}
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
                        <div class="row">
                            <div class="col-md-2 col-md-offset-8">
                                {!! Form::submit('Update', ['class' => 'btn btn-block btn-primary']) !!}
                            </div>
                            <div class="col-md-2">
                                <a href="{{ url('admin/case/'.$data->id.'/view') }}" class="btn btn-block btn-danger"
                                   role="button">Cancel</a>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


@endsection