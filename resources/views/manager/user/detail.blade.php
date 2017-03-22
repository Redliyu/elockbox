@extends('layouts.dashboard')

@section('head')

@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text"></i>Profile</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{ url('login') }}">Home</a></li>
                <li><i class="fa fa-folder-open"></i>User Management</li>
                <li><i class="fa fa-list"></i><a href="{{ url('manager/user/view') }}">View Users</a></li>
                <li><i class="fa fa-file-text"></i>Profile</li>
            </ol>
        </div>
    </div>

        <div class="row profile">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {{--Avatar--}}
                        <div class="col-md-4" style="margin-top: 20px">
                            <div class="text-center">
                                <img class="img-profile" src="{{ asset('cssnew/assets/img/avatar.png') }}">
                            </div>
                            <h3 class="text-center"><strong>{{ $user->first_name.' '.$user->last_name }}</strong></h3>
                            <h5 class="text-center" style="color: #686868"><strong><em>{{ $role }}</em></strong></h5>
                            <hr>
                            <div class="text-center">
                                <li><a href="#" class="fa fa-facebook facebook-bg"></a></li>
                                <li><a href="#" class="fa fa-twitter twitter-bg"></a></li>
                                <li><a href="#" class="fa fa-linkedin linkedin-bg"></a></li>
                            </div>
                        </div>
                        {{--General Information--}}
                        <div class="col-md-8" style="margin-top: 20px">
                            <h4><strong>General Information</strong></h4>
                            <div class="col-md-6">
                                <ul class="profile-details">
                                    <li>
                                        <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                                       style="color: #4C4F53"></i><strong>
                                                Email</strong>
                                        </div>
                                        <div style="color: #6699CC">
                                            @if($user->email)
                                                {{ $user->email }}
                                            @else
                                                N/A
                                            @endif
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="profile-details">
                                    <li>
                                        <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                                       style="color: #4C4F53"></i><strong>
                                                Phone</strong>
                                        </div>
                                        <div style="color: #6699CC">
                                            @if($profile->phone_number)
                                                {{ $profile->phone_number }}
                                            @else
                                                N/A
                                            @endif
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-12">
                                <ul class="profile-details">
                                    <li>
                                        <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                                       style="color: #4C4F53"></i><strong>
                                                Address</strong>
                                        </div>
                                        <div style="color: #6699CC">
                                            @if($profile->address1)
                                                {{ $profile->address1.' '.$profile->address2.', '.$profile->city.', '.$profile->state.', '.$profile->zip }}
                                            @else
                                                N/A
                                            @endif
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-12" style="margin-top: 13px">
                                <div class="row">

                                </div>
                            </div>
                        </div>






                    </div>

                </div>

            </div><!--/.col-->
        </div><!--/.row profile-->



@endsection