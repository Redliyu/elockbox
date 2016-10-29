@extends('layouts.welcome')
@section('content')
    <header class="header">
        <div class="container">
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand scroll-top logo"><b><img src="{{ url('assets/img/logo.png') }}" alt=""></b></a>
                </div>
                <!--/.navbar-header-->
                <div id="main-nav" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav" id="mainNav">
                        <li><a href="{{ url('/') }}" class="scroll-link"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
                    </ul>
                </div>
                <!--/.navbar-collapse-->
            </nav>
            <!--/.navbar-->
        </div>
        <!--/.container-->
    </header>

    <section id="login" class="page-section secPad">
        <div class="container">
            <div class="row">
                <div class="heading text-center">
                    <!-- Heading -->
                    <h2>Let's Keep In Touch!</h2>
                    <p>Thank you for visiting out E-lockbox. If you would like to get into contact with us, please use the infromation below.</p>
                </div>
            </div>

            {!! Form::open(['route' => 'generate']) !!}

            @if (session()->has('flash_message'))
                <div class="form-group">
                    <p>{{ session()->get('flash_message') }}</p>
                </div>
            @endif
            @if (session()->has('error_message'))
                <div class="form-group alert alert-danger">
                    <p>{{ session()->get('error_message') }}</p>
                </div>
            @endif

            <div class="row">
                <div class="col-sm-4 col-sm-offset-4 center-block">
                    <div class="form-group">
                        <span class="glyphicon glyphicon-user"></span>
                        {{ Form::label('Username') }}
                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'email@example.com', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group">
                        <span class="glyphicon glyphicon-lock"></span>
                        {{ Form::label('Password') }}
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Log in', ['class' => 'btn btn-block btn-primary']) !!}
                        <span class="form-group" style="padding-left: 63%" data-toggle="collapse" data-target="#notes"><a>Forgot your password?</a></span>
                    </div>
                    <div id="notes" class="collapse">
                        <p>If you forget your password, please contact your case manager for help.</p>
                    </div>
                </div>
            </div>
        </div>
        <!--/.container-->
    </section>


{{--{!! Form::open(['route' => 'generate']) !!}--}}
{{--@if (session()->has('flash_message'))--}}
    {{--<div class="form-group">--}}
        {{--<p>{{ session()->get('flash_message') }}</p>--}}
    {{--</div>--}}
{{--@endif--}}
{{--@if (session()->has('error_message'))--}}
    {{--<div class="form-group">--}}
        {{--<p>{{ session()->get('error_message') }}</p>--}}
    {{--</div>--}}
{{--@endif--}}
{{--<div class="form-group">--}}
    {{--{!! Form::text('email', null, ['placeholder' => 'Email', 'required' => 'required']) !!}--}}
{{--</div>--}}
{{--<div class="form-group">--}}
    {{--{!! Form::password('password', ['placeholder' => 'Password', 'required' => 'required']) !!}--}}
{{--</div>--}}
{{--<div class="form-group">--}}
    {{--{!! Form::submit('Log in') !!}--}}
{{--</div>--}}
{{--{!! Form::close() !!}--}}

@endsection