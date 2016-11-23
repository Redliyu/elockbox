@extends('layouts.dashboard')

@section('content')
    <?php
    $i = 0; $j = 0;
    foreach ($users as $user) {
        $data[$i]['id'] = $user->id;
        $data[$i]['ln'] = $user->last_name;
        $data[$i]['fn'] = $user->first_name;
        $data[$i]['em'] = $user->email;
        foreach ($profiles as $profile) {
            if($profile->user_id == $user->id) {
                $data[$i]['ph'] = $profile->phone_number;
            }else {
                $data[$i]['ph'] = "";
            }
        }
        foreach ($user_roles as $user_role) {
            if($user_role->user_id == $user->id) {
                if($user_role->role_id == 1) {
                    $data[$i]['ro'] = "Admin";
                }elseif($user_role->role_id == 2) {
                    $data[$i]['ro'] = "Case Manager";
                }elseif($user_role->role_id == 3) {
                    $data[$i]['ro'] = "Staff";
                }elseif($user_role->role_id == 4) {
                    $data[$i]['ro'] = "Youth";
                }else {
                    $data[$i]['ro'] = "Phantom";
                }
            }
        }
        foreach ($statuss as $status) {
            if($status->user_id == $user->id) {
                $data[$i]['ac'] = "Active";
                break;
            }else {
                $data[$i]['ac'] = "Inactive";
            }
        }

        $i++;
    }

    for( $i = 0; $i < count($data); $i ++ ) {
        echo $data[$i]['id'];
        echo " ";
        echo $data[$i]['ln'];
        echo " ";
        echo $data[$i]['fn'];
        echo " ";
        echo $data[$i]['em'];
        echo " ";
        echo $data[$i]['ph'];
        echo " ";
        echo $data[$i]['ro'];
        echo " ";
        echo $data[$i]['ac'];

        echo "<br>";
    }


    ?>


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