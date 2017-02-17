@extends('layouts.dashboard')


@section('head')

    <link href="{{ asset('cssnew/datepicker/jquery-ui.css') }}" rel="stylesheet">
    <script src="{{ asset('cssnew/datepicker/js/jquery-3.1.1.js') }}"></script>
    <script src="{{ asset('cssnew/datepicker/jquery-ui.js') }}"></script>
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}


    <script type="text/javascript">
        // When the document is ready
        $(document).ready(function () {

            $('#birthday_create').datepicker({
                maxDate: new Date(),
                dateFormat: "mm/dd/yy",
                changeYear: true,
                changeMonth: true,
            });


        });

    </script>

@stop


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

    {!! Form::open(['route' => 'manager.case.store']) !!}
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
                    {!! Form::text('birthday', date("m/d/Y", time()), ['id' => 'birthday_create', 'placeholder' => 'mm/dd/yyyy', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('gender', 'Gender',['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px']) !!}
                <div class="col-md-10">
                    {!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female', 'N/A' => 'Decline to State'], null, ['placeholder' => 'Choose your gender...', 'class' => 'form-control']) !!}
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
                    {!! Form::select('program', $program_name, null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('creator', 'Created By', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px']) !!}
                <div class="col-md-10">
                    {!! Form::text('creator', Sentinel::getUser()->email, ['class' => 'form-control', 'disabled']) !!}
                </div>
            </div>
            <div class="form-group row" style="display: none; visibility: hidden">
                {!! Form::label('creator', 'Created By', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px']) !!}
                <div class="col-md-10">
                    {!! Form::text('creator', Sentinel::getUser()->email, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group pull-right">
                {!! Form::submit('Create Case', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection