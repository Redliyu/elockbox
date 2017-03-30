<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>e-Lockbox</title>
    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="{{ asset('cssnew/assets/ico/favicon.ico') }}" type="image/x-icon"/>

    <!-- Css files -->
    <link href="{{ asset('cssnew/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('cssnew/assets/css/jquery.mmenu.css') }}" rel="stylesheet">
    <link href="{{ asset('cssnew/assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('cssnew/assets/css/climacons-font.css') }}" rel="stylesheet">
    <link href="{{ asset('cssnew/assets/plugins/xcharts/css/xcharts.min.css') }}" rel=" stylesheet">
    <link href="{{ asset('cssnew/assets/plugins/fullcalendar/css/fullcalendar.css') }}" rel="stylesheet">
    <link href="{{ asset('cssnew/assets/plugins/morris/css/morris.css') }}" rel="stylesheet">
    <link href="{{ asset('cssnew/assets/plugins/jquery-ui/css/jquery-ui-1.10.4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('cssnew/assets/plugins/jvectormap/css/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet">
    <link href="{{ asset('cssnew/assets/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('cssnew/assets/css/add-ons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('cssnew/assets/plugins/dropzone/css/dropzone.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <style>
        .frame {
            padding: 15px;
        }

        .frame2 {
            padding-left: 2%;
            padding-right: 2%;
        }

        .coverall {
            margin-top: 3.0%;
            height: 100%;
            width: 100%;
            background-color: white;

        }

        body {
            background: white;
        }

        .hidden {
            display: none;
        }

        .green {
            color: green;
        }

        .red {
            color: red;
        }
    </style>
    <script>
        $(document).ready(function () {
            $("#button_addinfo").click(function () {
                $(".add_info").toggleClass("hidden");
                $("#button_addinfo").toggleClass("green");
                $("#button_addinfo").toggleClass("fa-plus-circle");
                $("#button_addinfo").toggleClass("fa-minus-circle");
                $("#button_addinfo").toggleClass("red");

            });
            $("#button_geninfo").click(function () {
                $(".gen_info").toggleClass("hidden");
                $("#button_geninfo").toggleClass("green");
                $("#button_geninfo").toggleClass("fa-plus-circle");
                $("#button_geninfo").toggleClass("fa-minus-circle");
                $("#button_geninfo").toggleClass("red");

            });
        });
    </script>

</head>
<body>
<div class="navbar" role="navigation" style="padding-left: 10px; padding-right:10px;">
    <div class="container-fluid">
        <ul class="nav navbar-nav navbar-left" style="padding: 0px; margin: 0px; width: 28%">
            <li class="visible-md visible-lg"><a href="{{url('/')}}"><img class="text-logo" style="width: 250px;"
                                                                          src="{{ asset('cssnew/assets/img/logo.png') }}"></a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-left" style="padding: 0px; font-size: 18px; color: rgb(22, 41,131)">
            <li class="visible-xs visible-sm visible-md visible-lg">
                <large><b>Welcome to</b></large>
                <i class="fa fa-cube fa-large"></i> <b>e-lockbox, {{sentinel::getUser()-> first_name}}! <i
                            class="fa fa-smile-o fa-large" aria-hidden="true"></i></b></li>
        </ul>
        <div class="copyrights">
            Collect from
            <a href="http://greenbay.usc.edu/csci577/fall2016/projects/team10">Team10</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li class="">
                <a id="cur_email" href="#" class="dropdown-toggle" data-toggle="dropdown">
                    @if($avatar)
                        <img class="user-avatar" src="{{asset($avatar->path.'/'.$avatar->filename)}}" alt="user-avatar">
                    @else
                        <img class="user-avatar" src="{{ asset('cssnew/assets/img/avatar.png') }}" alt="user-mail">
                    @endif
                </a>
            </li>
            <li class="visible-sm visible-md visible-lg">
                <a>{{sentinel::getUser()->email}}</a>
            </li>
            <li><a href="{{ url('/logout') }}"><i class="fa fa-power-off"></i></a></li>
        </ul>
    </div>
</div>
<br/>
<div class="coverall">
    <div class="frame">
        <h3><strong>General Information</strong> <i id="button_geninfo" class="fa fa-minus-circle red"
                                                    aria-hidden="true"></i></h3>
        <div class="frame2 gen_info">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <ul class="profile-details">
                    <li>
                        <div style="color: #4C4F53"><i class="fa fa-envelope"
                                                       style="color: #4C4F53"></i><strong>
                                Email</strong>
                        </div>
                        <div style="color: #6699CC">
                            @if($data->email)
                                {{ $data->email }}
                            @else
                                N/A
                            @endif
                        </div>
                    </li>
                    <li>
                        <div style="color: #4C4F53"><i class="fa fa-calendar"
                                                       style="color: #4C4F53"></i><strong>
                                Birthday</strong>
                        </div>
                        <div style="color: #6699CC">
                            {{--@if($data->birthday)--}}
                            {{--{{ date('m/d/Y', strtotime($data->birthday)) }}--}}
                            {{--@else--}}
                            {{--N/A--}}
                            {{--@endif--}}
                            <?php $date = new DateTime($data->birthday);
                            if ($date->format('m/d/Y') == "12/31/1969") {
                                echo "N/A";
                            } else {
                                echo $date->format('m/d/Y');
                            }
                            ?>
                        </div>
                    </li>
                    <li>
                        <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                       style="color: #4C4F53"></i><strong>
                                Status</strong>
                        </div>
                        @if($data->status)
                            <div style="color: #6699CC">Active</div>
                        @else
                            <div style="color: #6699CC">Inactive</div>
                        @endif
                        {{--<div style="color: #4C4F53"><i class="fa fa-building-o"--}}
                        {{--style="color: #4C4F53"></i><strong>--}}
                        {{--Webpage</strong>--}}
                        {{--</div>--}}
                        {{--<div style="color: #6699CC">--}}
                        {{--@if($data->webpage)--}}
                        {{--{{ $data->webpage }}--}}
                        {{--@else--}}
                        {{--N/A--}}
                        {{--@endif--}}
                        {{--</div>--}}
                    </li>
                </ul>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12">
                <ul class="profile-details">
                    <li>
                        <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                       style="color: #4C4F53"></i><strong>
                                Program</strong>
                        </div>
                        <div style="color: #6699CC">
                            @if($data->program)
                                {{ $program_name[$data->program] }}
                            @else
                                N/A
                            @endif
                        </div>
                    </li>
                    <li>
                        <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                       style="color: #4C4F53"></i><strong>
                                Gender</strong>
                        </div>
                        <div style="color: #6699CC">
                            @if($data->gender)
                                {{ $data->gender }}
                            @else
                                N/A
                            @endif
                        </div>
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

            <div class="col-md-4 col-sm-4 col-xs-12 ">
                <ul class="profile-details">
                    <li>
                        <div style="color: #4C4F53"><i class="fa fa-user"
                                                       style="color: #4C4F53"></i><strong>
                                Manager</strong>
                        </div>
                        <div style="color: #6699CC">{{ $data->cm_name }}
                        </div>
                    </li>
                    <li>
                        <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                       style="color: #4C4F53"></i><strong>
                                Ethnicity</strong></div>
                        <div style="color: #6699CC">
                            @if($data->ethnicity)
                                {{ $data->ethnicity }}
                            @else
                                N/A
                            @endif
                        </div>
                    </li>
                    <li>
                        <div style="color: #4C4F53"><i class="fa fa-building-o"
                                                       style="color: #4C4F53"></i><strong> Social
                                Security
                                Number</strong></div>
                        <div style="color: #6699CC" onclick="show_ssn()" id="hidden_ssn">
                            @if($data->ssn)
                                <?php
                                //                                            $ssn_array = str_split($data->ssn);
                                //                                            echo "***-**-".$ssn_array[7].$ssn_array[8].$ssn_array[9].$ssn_array[10]
                                preg_match('/.*(\d{4})/', $data->ssn, $results);
                                echo "***-**-" . $results[1];
                                ?>
                            @else
                                N/A
                            @endif
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- display the vital document -->
        <h3><strong>Vital Documents</strong></h3>
        <div class="frame2">
            <table class="table table-striped">
                <thead>
                <tr style="text-align: left">
                    <th style="width: 14%;">Type</th>
                    <th style="width: 14%;">Title</th>
                    <th style="width: 14%;">Uploaded By</th>
                    <th style="width: 21%;">Upload Date</th>
                    <th style="width: 21%;">Last Modified Date</th>
                </tr>

                </thead>
                <tbody>
                @foreach($docs as $doc)
                    <tr>
                        <td>{{ $doc_type_abbr[$doc->type] }}</td>
                        <td>
                            <a href="{{asset($doc->path.'/'.$doc->filename)}}"
                               target="_blank" data-toggle="tooltip" data-placement="top"
                               title="{{$doc->description}}">{{$doc->title}}</a>
                        </td>
                        <td>{{$doc->uploader}}
                        </td>
                        <td>{{date("m/d/Y H:i:s", strtotime($doc->created_at))}}</td>
                        <td>{{date("m/d/Y H:i:s", strtotime($doc->updated_at))}}</td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>


        <h3><strong>Additional Information</strong> <i id="button_addinfo" class="fa fa-plus-circle green"
                                                       aria-hidden="true"></i></h3>
        {{--Contact Information--}}
        <div class="col-md-12 add_info hidden">
            <div class="col-md-12">
                <div class="col-md-12 col-xs-12" style="padding: 0px; margin: 0px;">
                    <h4><strong>Contact Information</strong></h4>
                </div>
                <!-- address -->
                <div class="col-md-12">
                    <h5><strong>Address</strong></h5>
                    @if($case_address->first() != null)
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="col-md-2">Address</th>
                                <th class="col-md-2">City</th>
                                <th class="col-md-2">State</th>
                                <th class="col-md-2">ZipCode</th>
                                <th class="col-md-2">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($case_address as $address)
                                <tr>
                                    <td>{{$address->address}}</td>
                                    <td>{{$address->city}}</td>
                                    <td>{{$address->state}}</td>
                                    <td>{{$address->zipcode}}</td>
                                    <td>{{$address->status}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>You have no content!</p>
                    @endif
                </div>

                <!-- phone -->
                <div class="col-md-12" style="">
                    <h5><strong>Phone</strong></h5>
                    @if($case_phone->first() != null)
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="col-md-4">Type</th>
                                <th class="col-md-4">Number</th>
                                <th class="col-md-4">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($case_phone as $phone)
                                <tr>
                                    <td>{{$phone->type}}</td>
                                    <td>{{$phone->number}}</td>
                                    <td>{{$phone->status}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>You have no content!</p>
                    @endif
                </div>

                <!-- email -->
                <div class="col-md-12" style="">
                    <h5><strong>Email</strong></h5>
                    @if($case_email->first() != null)
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="col-md-6">Email</th>
                                <th class="col-md-6">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($case_email as $email)
                                <tr>
                                    <td>{{$email->email}}</td>
                                    <td>{{$email->status}}</td>
                                    @if($data->status)
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>You have no content!</p>
                    @endif
                </div>
            </div>
            {{--Additional Contacts--}}
            <div class="col-md-12">
                <div class="col-md-12" style="padding: 0px; margin: 0px;">
                    <h4><strong>Additional Contacts</strong></h4>
                </div>
                @if($addcontacts->first() != null)
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="col-md-2">Name</th>
                            <th class="col-md-2">Relationship</th>
                            <th class="col-md-2">Phone</th>
                            <th class="col-md-2">Email</th>
                            <th class="col-md-2">Address</th>
                            <th class="col-md-2">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($addcontacts as $addcontact)
                            <tr>
                                <td>{{$addcontact->name}}</td>
                                <td>{{$addcontact->relationship}}</td>
                                <td>{{$addcontact->phone}}</td>
                                <td>{{$addcontact->email}}</td>
                                <td>{{$addcontact->address}}</td>
                                <td>{{$addcontact->status}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>You have no content!</p>
                @endif
            </div>
            {{--Education History--}}
            <div class="col-md-12">
                <div class="col-md-12" style="padding: 0px; margin: 0px;">
                    <h4><strong>Education History</strong></h4>
                </div>
                @if($eduhistorys->first() != null)
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="col-md-2">Start Date</th>
                            <th class="col-md-2">End Date</th>
                            <th class="col-md-2">School</th>
                            <th class="col-md-2">Level</th>
                            <th class="col-md-2">Address</th>
                            <th class="col-md-2">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($eduhistorys as $eduhistory)
                            <tr>
                                <td>{{$eduhistory->start_date}}</td>
                                <td>{{$eduhistory->end_date}}</td>
                                <td>{{$eduhistory->school}}</td>
                                <td>{{$eduhistory->level}}</td>
                                <td>{{$eduhistory->address}}</td>
                                <td>{{$eduhistory->status}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>You have no content!</p>
                @endif
            </div>

            {{--Work History--}}
            <div class="col-md-12">
                <div class="col-md-12" style="padding: 0px; margin: 0px;">
                    <h4><strong>Work History</strong></h4>
                </div>
                @if($workhistorys->first() != null)
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="col-md-2">Start Date</th>
                            <th class="col-md-2">End Date</th>
                            <th class="col-md-2">Company</th>
                            <th class="col-md-2">Industry</th>
                            <th class="col-md-2">Address</th>
                            <th class="col-md-2">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($workhistorys as $workhistory)
                            <tr>
                                <td>{{$workhistory->start_date}}</td>
                                <td>{{$workhistory->end_date}}</td>
                                <td>{{$workhistory->company}}</td>
                                <td>{{$workhistory->industry}}</td>
                                <td>{{$workhistory->address}}</td>
                                <td>{{$workhistory->status}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>You have no content!</p>
                @endif
            </div>
        </div>

    </div>

</div>
</body>