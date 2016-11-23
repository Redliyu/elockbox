@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-plus-circle"></i> Create Case</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{ url('login') }}">Home</a></li>
                <li><i class="fa fa-folder-open"></i>Case Management</li>
                <li><i class="fa fa-plus-circle"></i>Create Case</li>
            </ol>
        </div>
    </div>

    {!! Form::open(['route' => 'admin.case.store']) !!}
    @if (session()->has('flash_message'))
        <div class="form-group alert-success">
            <p>{{ session()->get('flash_message') }}</p>
        </div>
    @endif
    <div class="col-md-8 col-md-offset-2" style="background-color: #FFFFFF">
    <div class="col-md-12">
        <br><br>
    <div class="form-group row">
        {!! Form::label('email', 'Email*', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px']) !!}
        <div class="col-md-10">
        {!! Form::text('email', null, ['placeholder' => 'Email', 'required' => 'required', 'class' => 'form-control']) !!}
        @if($errors->has('email'))
            {!! $errors->first('email') !!}
        @endif
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('first_name', 'First Name*', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px']) !!}
        <div class="col-md-10">
        {!! Form::text('first_name', null, ['placeholder' => 'First name', 'required' => 'required', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('last_name', 'Last Name*', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px']) !!}
        <div class="col-md-10">
        {!! Form::text('last_name', null, ['placeholder' => 'Last name', 'required' => 'required', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('birthday', 'DOB', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px']) !!}
        <div class="col-md-10">
        {!! Form::text('birthday', null, ['placeholder' => 'yyyy-mm-dd', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('gender', 'Gender',['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px']) !!}
        <div class="col-md-10">
        {!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other'], null, ['placeholder' => 'Choose your gender...', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('webpage', 'Web Page', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px']) !!}
        <div class="col-md-10">
        {!! Form::text('webpage', null, ['Placeholder' => 'Web Page', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('ssn', 'SSN', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px']) !!}
        <div class="col-md-10">
        {!! Form::text('ssn', null, ['Placeholder' => 'AAA-GG-SSSS', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('ilp', 'ILP', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px']) !!}
        <div class="col-md-10">
        {!! Form::select('ilp', ['1' => 'Yes', '0' => 'No'], null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('ethnicity', 'Ethnicity', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px']) !!}
        <div class="col-md-10">
        {!! Form::select('ethnicity', ['Asian' => 'Asian', 'African American' => 'African American', 'Caucasian' => 'Caucasian', 'Latino' => 'Latino', 'Multiracial' => 'Multiracial', 'Native American' => 'Native American'], null, ['placeholder' => 'Choose your ethnicity...', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('program', 'Program', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px']) !!}
        <div class="col-md-10">
        {!! Form::select('program', ['Program1' => 'Program1'], null, ['placeholder' => 'Choose your program...', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group pull-right">
        {!! Form::submit('Create Case', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    </div>
    </div>
@endsection