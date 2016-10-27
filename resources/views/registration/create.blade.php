{!! Form::open(['route' => 'store']) !!}
@if (session()->has('flash_message'))
    <div class="form-group">
        <p>{{ session()->get('flash_message') }}</p>
    </div>
@endif
{{--improve performance--}}
{{--we should detect whether email and pwd are valid while inputing, rather than after submit--}}
<div class="form-group">
    {!! Form::text('email', null, ['placeholder' => 'Email', 'required' => 'required']) !!}
    @if($errors->has('email'))
        {!! $errors->first('email') !!}
    @endif
</div>
<div class="form-group">
    {!! Form::password('password', ['placeholder' => 'Password', 'required' => 'required']) !!}
    @if($errors->has('password'))
        {!! $errors->first('password') !!}
    @endif
</div>
<div class="form-group">
    {!! Form::password('password_confirmation', ['placeholder' => 'Password', 'required' => 'required']) !!}
</div>
<div class="form-group">
    {!! Form::text('first_name', null, ['placeholder' => 'First name', 'required' => 'required']) !!}
</div>
<div class="form-group">
    {!! Form::text('last_name', null, ['placeholder' => 'Last name', 'required' => 'required']) !!}
</div>
<div class="form-group">
    {!! Form::select('role', ['Admins' => 'Admin', 'Managers' => 'Case Manager', 'Staff' => 'Staff', 'Youths' => 'Youth']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Create and Activate Account') !!}
</div>
{!! Form::close() !!}