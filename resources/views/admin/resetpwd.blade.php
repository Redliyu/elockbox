{!! Form::open(['url' => 'reset']) !!}
@if (session()->has('flash_message'))
    <div class="form-group">
        <p>{{ session()->get('flash_message') }}</p>
    </div>
@endif
<div class="form-group">
    {!! Form::label('Email*') !!}
    {!! Form::email('email', null, ['placeholder' => 'Email', 'required' => 'required']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Request') !!}
</div>
{!! Form::close() !!}