@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-plus-circle"></i> Create Case</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{ url('login') }}">Home</a></li>
                <li><i class="fa fa-user"></i>Case Management</li>
                <li><i class="fa fa-plus-circle"></i>Create Case</li>
            </ol>
        </div>
    </div>
    {!! Form::open() !!}
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
        {!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Web Page') !!}
        {!! Form::text('webpage', null, ['Placeholder' => 'Web Page']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('SSN') !!}
        {!! Form::text('ssn', null, ['Placeholder' => 'AAA-GG-SSSS']) !!}
    </div>
    {!! Form::close() !!}
@endsection