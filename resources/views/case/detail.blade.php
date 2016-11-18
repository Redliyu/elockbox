@extends('layouts.dashboard')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text"></i>Profile</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{ url('login') }}">Home</a></li>
                <li><i class="fa fa-folder-open"></i>Case Management</li>
                <li><i class="fa fa-list"></i><a href="#">View Cases</a></li>
                <li><i class="fa fa-file-text"></i>Profile</li>
            </ol>
        </div>
    </div>

    <div class="row profile">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        <img class="img-profile" src="{{ asset('cssnew/assets/img/avatar.jpg') }}">
                    </div>

                    <h3 class="text-center"><strong>{{ $data->last_name }}, {{ $data->first_name }}</strong></h3>
                    <h4 class="text-center">
                        <small><i class="fa fa-map-marker"></i> California, USA</small>
                    </h4>

                    <hr>

                    <div class="text-center">
                        <li><a href="#" class="fa fa-facebook facebook-bg"></a></li>
                        <li><a href="#" class="fa fa-twitter twitter-bg"></a></li>
                        <li><a href="#" class="fa fa-linkedin linkedin-bg"></a></li>
                    </div>

                    <hr>
                    <div class="col-md-12">
                        <h4><strong>General Information</strong></h4>
                        <div class="col-md-4">
                            <ul class="profile-details">
                                <li>
                                    <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                                   style="color: #4C4F53"></i><strong> Gender</strong>
                                    </div>
                                    <div style="color: #6699CC"> {{ $data->gender }}</div>
                                </li>
                                <li>
                                    <div style="color: #4C4F53"><i class="fa fa-calendar"
                                                                   style="color: #4C4F53"></i><strong> Birthday</strong>
                                    </div>
                                    <div style="color: #6699CC">{{ $data->birthday }}</div>
                                </li>
                                <li>
                                    <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                                   style="color: #4C4F53"></i><strong> Webpage</strong>
                                    </div>
                                    <div style="color: #6699CC">{{ $data->webpage }}</div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="profile-details">
                                <li>
                                    <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                                   style="color: #4C4F53"></i><strong> Social Security
                                            Number</strong></div>
                                    <div style="color: #6699CC">{{ $data->ssn }}</div>
                                </li>
                                <li>
                                    <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                                   style="color: #4C4F53"></i><strong> Status</strong>
                                    </div>
                                    @if($data->status)
                                        <div style="color: #6699CC">Active</div>
                                    @else
                                        <div style="color: #6699CC">Inactive</div>
                                    @endif
                                </li>
                                <li>
                                    <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                                   style="color: #4C4F53"></i><strong> ILP</strong>
                                    </div>
                                    @if($data->ILP == 1)
                                        <div style="color: #6699CC">Yes</div>
                                    @elseif($data->ILP == 0)
                                        <div style="color: #6699CC">No</div>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="profile-details">
                                <li>
                                    <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                                   style="color: #4C4F53"></i><strong>
                                            Ethnicity</strong></div>
                                    <div style="color: #6699CC">{{ $data->ethnicity }}</div>
                                </li>
                                <li>
                                    <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                                   style="color: #4C4F53"></i><strong> Program</strong>
                                    </div>
                                    <div style="color: #6699CC">{{ $data->program }}</div>
                                </li>
                                <li>
                                    <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                                   style="color: #4C4F53"></i><strong> Manager</strong>
                                    </div>
                                    <div style="color: #6699CC">BLANK
                                        <div style="color: #6699CC">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <h4><strong>Contact Information</strong></h4>

                        <ul class="profile-details">
                            <li>
                                <div><i class="fa fa-phone"></i> Phone</div>
                                +25 2569 256
                            </li>
                            <li>
                                <div><i class="fa fa-tablet"></i> Mobile</div>
                                +62 2569 2568 256
                            </li>
                            <li>
                                <div><i class="fa fa-envelope"></i> E-mail</div>
                                jhonsmith@mail.com
                            </li>
                            <li>
                                <div><i class="fa fa-map-marker"></i> address</div>
                                Blackstreet No. 256<br/>
                                1256 California, USA<br/>
                            </li>
                        </ul>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                            <a href="{{ url('admin/case/'.$data->id.'/edit') }}" class="btn btn-block btn-primary" role="button">Edit</a>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-block btn-warning" href="#">Inactive</button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-block btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div><!--/.col-->
    </div><!--/.row profile-->
@endsection