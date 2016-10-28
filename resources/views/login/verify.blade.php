{!! Form::open(['route' => 'vrfy']) !!}
@if (session()->has('error_message'))
    <div class="form-group">
        <p>{{ session()->get('error_message') }}</p>
    </div>
@endif
<div style="visibility: hidden; display: none">
    {!! Form::text('user_id', $user_id) !!}
</div>
    {!! Form::text('vrfycode', null, ['placeholder' => 'Enter verification code', 'required' => 'required']) !!}
    {!! Form::submit('Verify') !!}
{!! Form::close() !!}