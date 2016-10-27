{!! Form::open(['route' => 'vrfy']) !!}
@if (session()->has('flash_message'))
    <div class="form-group">
        <p>{{ session()->get('flash_message') }}</p>
    </div>
@endif
<div class="form-group">
    {!! Form::text('email', null, ['placeholder' => 'Email', 'required' => 'required']) !!}
</div>
<div class="form-group">
    {!! Form::password('password', ['placeholder' => 'Password', 'required' => 'required']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Log in') !!}
</div>
{!! Form::close() !!}