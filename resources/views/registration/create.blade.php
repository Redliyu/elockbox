@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-plus-circle"></i> Create User</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{ url('admin') }}">Home</a></li>
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
        <div class="form-group">
            {!! Form::label('Email*') !!}
            {!! Form::text('email', null, ['placeholder' => 'Email', 'required' => 'required']) !!}
            @if($errors->has('email'))
                {!! $errors->first('email') !!}
            @endif
        </div>
        <div class="form-group">
            {!! Form::label('Password*') !!}
            {!! Form::password('password', ['placeholder' => 'Password', 'required' => 'required']) !!}
            @if($errors->has('password'))
                {!! $errors->first('password') !!}
            @endif
        </div>
        <div class="form-group">
            {!! Form::label('Password*') !!}
            {!! Form::password('password_confirmation', ['placeholder' => 'Confirm password', 'required' => 'required']) !!}
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
            {!! Form::label('Phone Number') !!}
            {!! Form::text('phone_number', null, ['placeholder' => 'e.g. 123-456-7890']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Address1') !!}
            {!! Form::text('address1', null, ['placeholder' => '']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Address2') !!}
            {!! Form::text('address2', null, ['placeholder' => '']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('City') !!}
            {!! Form::text('city', null, ['placeholder' => '']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('State') !!}
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
            'WY' => 'WY']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('ZIP') !!}
            {!! Form::text('zip', null, ['placeholder' => '90000']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Level*') !!}
            {!! Form::select('role', ['Admins' => 'Admin', 'Managers' => 'Case Manager', 'Staff' => 'Staff', 'Youths' => 'Youth']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Create and Activate Account') !!}
        </div>
        {!! Form::close() !!}
@endsection