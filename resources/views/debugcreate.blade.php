{!! Form::open(['route' => 'debugstore']) !!}
@if (session()->has('flash_message'))
    <div class="form-group">
        <p>{{ session()->get('flash_message') }}</p>
    </div>
@endif
<div class="form-group">
    {!! Form::label('Email*') !!}
    {!! Form::email('email', null, ['placeholder' => 'Email', 'required' => 'required']) !!}
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
    {!! Form::label('Level*') !!}
    {!! Form::select('role', ['Admins' => 'Admin', 'Managers' => 'Case Manager', 'Staff' => 'Staff', 'Youths' => 'Youth']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Create and Activate Account') !!}
</div>
{!! Form::close() !!}