@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text"></i> View Users</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{ url('login') }}">Home</a></li>
                <li><i class="fa fa-user"></i>User Management</li>
                <li><i class="fa fa-list"></i>View Users</li>
            </ol>
        </div>
    </div>
    <!--    --><?php
    //    $i = 0; $j = 0;
    //    foreach ($users as $user) {
    //        $data[$i]['id'] = $user->id;
    //        $data[$i]['ln'] = $user->last_name;
    //        $data[$i]['fn'] = $user->first_name;
    //        $data[$i]['em'] = $user->email;
    //        foreach ($profiles as $profile) {
    //            if ($profile->user_id == $user->id) {
    //                $data[$i]['ph'] = $profile->phone_number;
    //            } else {
    //                $data[$i]['ph'] = "";
    //            }
    //        }
    //        foreach ($user_roles as $user_role) {
    //            if ($user_role->user_id == $user->id) {
    //                if ($user_role->role_id == 1) {
    //                    $data[$i]['ro'] = "Admin";
    //                } elseif ($user_role->role_id == 2) {
    //                    $data[$i]['ro'] = "Case Manager";
    //                } elseif ($user_role->role_id == 3) {
    //                    $data[$i]['ro'] = "Staff";
    //                } elseif ($user_role->role_id == 4) {
    //                    $data[$i]['ro'] = "Youth";
    //                } else {
    //                    $data[$i]['ro'] = "Phantom";
    //                }
    //            }
    //        }
    //        foreach ($statuss as $status) {
    //            if ($status->user_id == $user->id) {
    //                $data[$i]['ac'] = "Active";
    //                break;
    //            } else {
    //                $data[$i]['ac'] = "Inactive";
    //            }
    //        }
    //
    //        $i++;
    //    }
    //
    //        for( $i = 0; $i < count($data); $i ++ ) {
    //            echo $data[$i]['id'];
    //            echo " ";
    //            echo $data[$i]['ln'];
    //            echo " ";
    //            echo $data[$i]['fn'];
    //            echo " ";
    //            echo $data[$i]['em'];
    //            echo " ";
    //            echo $data[$i]['ph'];
    //            echo " ";
    //            echo $data[$i]['ro'];
    //            echo " ";
    //            echo $data[$i]['ac'];
    //
    //            echo "<br>";
    //        }
    //
    //
    //    ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2><i class="fa fa-table red"></i><span class="break"></span><strong>Users</strong></h2>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Level</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td>{{$data['ln']}}, {{$data['fn']}}</td>
                                <td>{{$data['em']}}</td>
                                <td>{{$data['ph']}}</td>
                                <td>{{$data['ro']}}</td>
                                <td>{{$data['ac']}}</td>
                                <td>Details</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div>
                    <div class="pull-right pagination">
                        {{ $datas->setPath('view')->render() }}
                    </div>
                </div>

            </div>
        </div><!--/col-->

    </div><!--/row-->


    {{--@foreach($users as $user)--}}
    {{--{{ $user->id." ".$user->last_name." ".$user->first_name." ".$user->email." "}}--}}
    {{--@foreach($profiles as $profile)--}}
    {{--@if($profile->user_id == $user->id)--}}
    {{--{{ $profile->phone_number }}--}}
    {{--@endif--}}
    {{--@endforeach--}}
    {{--@foreach($user_roles as $user_role)--}}
    {{--@if($user_role->user_id == $user->id)--}}
    {{--@if($user_role->role_id == 1)--}}
    {{--{{ "Admin" }}--}}
    {{--@elseif($user_role->role_id == 2)--}}
    {{--{{ "Case Manager" }}--}}
    {{--@elseif($user_role->role_id == 3)--}}
    {{--{{ "Staff" }}--}}
    {{--@elseif($user_role->role_id == 4)--}}
    {{--{{ "Youth" }}--}}
    {{--@endif--}}
    {{--@endif--}}
    {{--@endforeach--}}
    {{--<br>--}}
    {{--@endforeach--}}

    @endsection