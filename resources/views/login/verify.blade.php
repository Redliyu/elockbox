{!! Form::open(['route' => 'vrfy']) !!}
<div class="form-group">
    {!! Form::text('vrfycode', null, ['placeholder' => 'Enter verification code', 'required' => 'required']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Verify') !!}
</div>
{!! Form::close() !!}

{{--{!! Form::open(['route' => 'vrfy']) !!}--}}
{{--<div class="form-group">--}}
    {{--{!! Form::submit('Generate') !!}--}}
{{--</div>--}}
{{--{!! Form::close() !!}--}}