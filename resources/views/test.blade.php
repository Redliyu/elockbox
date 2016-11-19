{!! Form::open(['route' => 'store']) !!}
@if (session()->has('flash_message'))
    <div class="form-group">
        <p>{{ session()->get('flash_message') }}</p>
    </div>
@endif
<form class="form-horizontal">
    <div class="form-group">
        {!! Form::label('email','Email*', ['class' => 'col-md-2 text-left']) !!}
        <div class="col-md-10">
            {!! Form::text('email', $data->email, ['placeholder' => 'Email', 'required' => 'required', 'disabled', 'class' => 'form-control']) !!}
            @if($errors->has('email'))
                {!! $errors->first('email') !!}
            @endif
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('password', 'Password*', ['class' => 'col-md-2 text-left']) !!}
        <div class="col-md-10">
            {!! Form::password('password', ['placeholder' => 'Password', 'required' => 'required', 'class' => 'form-control']) !!}
            @if($errors->has('password'))
                {!! $errors->first('password') !!}
            @endif
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('password_confirmation', 'Password*', ['class' => 'col-md-2 text-left']) !!}
        <div class="col-md-10">
            {!! Form::password('password_confirmation', ['placeholder' => 'Confirm password', 'required' => 'required', 'class' => 'form-control']) !!}
        </div>
    </div>
</form>
{!! Form::close() !!}