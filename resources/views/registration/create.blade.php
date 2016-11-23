@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-plus-circle"></i> Create User</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{ url('login') }}">Home</a></li>
                <li><i class="fa fa-user"></i>User Management</li>
                <li><i class="fa fa-plus-circle"></i>Create User</li>
            </ol>
        </div>
    </div>
    {!! Form::open(['route' => 'store']) !!}
    @if (session()->has('flash_message'))
        <div class="form-group">
            <p>{{ session()->get('flash_message') }}</p>
        </div>
    @endif
    {{--improve performance--}}
    {{--we should detect whether email and pwd are valid while inputing, rather than after submit--}}
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
                {!! Form::label('password', 'Password*', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px']) !!}
                <div class="col-md-10">
                    {!! Form::password('password', ['placeholder' => 'Password', 'required' => 'required', 'class' => 'form-control']) !!}
                    @if($errors->has('password'))
                        {!! $errors->first('password') !!}
                    @endif
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('password', 'Password*', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px']) !!}
                <div class="col-md-10">
                    {!! Form::password('password_confirmation', ['placeholder' => 'Confirm password', 'required' => 'required', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('first_name','First Name*', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px']) !!}
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
                {!! Form::label('phone_number', 'Phone', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px']) !!}
                <div class="col-md-10">
                    {!! Form::text('phone_number', null, ['placeholder' => 'e.g. 123-456-7890', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('address1', 'Address1', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px']) !!}
                <div class="col-md-10">
                    {!! Form::text('address1', null, ['placeholder' => '', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('address2', 'Address2', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px']) !!}
                <div class="col-md-10">
                    {!! Form::text('address2', null, ['placeholder' => '', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('city', 'City', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px']) !!}
                <div class="col-md-10">
                    {!! Form::text('city', null, ['placeholder' => '', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('state', 'State', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px']) !!}
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
                {!! Form::label('zip', 'ZIP', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px']) !!}
                <div class="col-md-10">
                    {!! Form::text('zip', null, ['placeholder' => '90000', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('role', 'Level*', ['class' => 'col-md-2 col-form-label control-label', 'style' => 'padding-top:7px']) !!}
                <div class="col-md-10">
                    {!! Form::select('role', ['Admins' => 'Admin', 'Managers' => 'Case Manager', 'Staff' => 'Staff', 'Youths' => 'Youth'], null, ['placeholder' => 'Choose user type...', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group pull-right">
                {!! Form::submit('Create and Activate Account', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection