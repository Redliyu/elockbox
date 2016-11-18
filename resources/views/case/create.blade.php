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
        <div class="form-group">
            <p>{{ session()->get('flash_message') }}</p>
        </div>
    @endif
    <div class="form-group">
        {!! Form::label('Email*') !!}
        {!! Form::text('email', null, ['placeholder' => 'Email', 'required' => 'required']) !!}
        @if($errors->has('email'))
            {!! $errors->first('email') !!}
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('First Name*') !!}
        {!! Form::text('first_name', null, ['placeholder' => 'First name', 'required' => 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Last Name*') !!}
        {!! Form::text('last_name', null, ['placeholder' => 'Last name', 'required' => 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('DOB') !!}
        {!! Form::text('birthday', null, ['placeholder' => 'yyyy-mm-dd']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Gender') !!}
        {!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other'], null, ['placeholder' => 'Choose your gender...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Web Page') !!}
        {!! Form::text('webpage', null, ['Placeholder' => 'Web Page']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('SSN') !!}
        {!! Form::text('ssn', null, ['Placeholder' => 'AAA-GG-SSSS']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('ILP') !!}
        {!! Form::select('ilp', ['1' => 'Yes', '0' => 'No']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Ethnicity') !!}
        {!! Form::select('ethnicity', ['Asian' => 'Asian', 'African American' => 'African American', 'Caucasian' => 'Caucasian', 'Latino' => 'Latino', 'Multiracial' => 'Multiracial', 'Native American' => 'Native American'], null, ['placeholder' => 'Choose your ethnicity...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Program') !!}
        {!! Form::select('program', ['Program1' => 'Program1'], null, ['placeholder' => 'Choose your program...']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Create Case') !!}
    </div>
    {!! Form::close() !!}
@endsection