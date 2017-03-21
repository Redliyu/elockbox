@extends('layouts.dashboard')

@section('head')
    <link href="{{ asset('cssnew/datepicker/jquery-ui.css') }}" rel="stylesheet">
    <script src="{{ asset('cssnew/datepicker/js/jquery-3.1.1.js') }}"></script>
    <script src="{{ asset('cssnew/datepicker/jquery-ui.js') }}"></script>

    <script>
        var focus_id = "to";
        function create() {
            document.getElementById("view_nav").style.display = "none";
            document.getElementById("view_nav").style.visibility = "hidden";
            document.getElementById("view_table").style.display = "none";
            document.getElementById("view_table").style.visibility = "hidden";
            document.getElementById("create_nav").style.display = "block";
            document.getElementById("create_nav").style.visibility = "visible";
            document.getElementById("create_table").style.display = "block";
            document.getElementById("create_table").style.visibility = "visible";
        }
        function change_focus(id) {
            focus_id = id;
        }
        function add(elem) {
            document.getElementById(focus_id).value = elem.childNodes[3].childNodes[0].nodeValue;
//            console.log(elem.childNodes[3].childNodes[0].nodeValue);
        }

        $(document).ready(function () {
            $('#ddl').datepicker({
                minDate: new Date(),
                dateFormat: "mm/dd/yy",
                changeYear: true,
                changeMonth: true,
            });
        });
        //        function delete_last(id) {
        //            if(event.keyCode == 8) {
        //                var org_str = document.getElementById(id).value;
        //                var temp = org_str.split(";");
        //                var new_str = org_str.replace(temp[temp.length-2], "");
        //                document.getElementById(id).value = new_str;
        //            }
        //        }
        //        function semi(id) {
        //            var str = document.getElementById(id).value;
        //            if(str[str.length-1] != ";") {
        //                str = str+";";
        //            }
        //            document.getElementById(id).value = str;
        //        }
        //        function help(id) {
        //            var list = document.getElementById("contacts_list");
        //            var name = [];
        //            for (var i = 0; i < list.childNodes.length; i++) {
        //                if (list.childNodes[i].nodeName == "LI") {
        //                    name.push(list.childNodes[i].childNodes[2].innerHTML);
        //                }
        //            }
        //            var cur_str = document.getElementById(id).value;
        //            var help_result = [];
        //            console.log(name);
        //            for (var i = 0; i < name.length; i++) {
        //                if (name[i].toLowerCase().includes(cur_str.toLowerCase())) {
        //                    help_result.push(name[i]);
        //                }
        //            }
        //            console.log(help_result);
        //        }
    </script>
@stop

@section('content')
    <div class="row" id="view_nav">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text"></i> Activities</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{ url('login') }}">Home</a></li>
                <li><i class="fa fa-folder-open"></i><a href="{{ url('admin') }}">Activities</a></li>
            </ol>
        </div>
    </div>

    <div class="row" id="view_table">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2><i class="fa fa-table red"></i><span class="break"></span><strong>Activities</strong></h2>
                    <span class="label label-success" style="margin-left: 10px; cursor: pointer" onclick="create();">Create</span>
                    <span class="label label-warning" style="margin-left: 10px; cursor: pointer">Report</span>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                        <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Task</th>
                            <th>Due Date</th>
                            <th>Assigned To</th>
                            <th>Created By</th>
                            <th>Mentioned To</th>
                            <th>Related Case</th>
                            <th>Last Modified Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($activities as $activity)
                            @if((($activity->assigned == Sentinel::getUser()->id) && ($activity->reci_status == 0)) || (($activity->mentioned == Sentinel::getUser()->id) && ($activity->ment_status == 0)))
                                <tr style="font-weight: 800">
                                    <td>{{$activity->subject}}</td>
                                    @if($activity->task)
                                        <td><i class="fa fa-check-square"></i></td>
                                    @else
                                        <td><i class="fa fa-square-o"></i></td>
                                    @endif
                                    <td>{{date("m/d/Y", strtotime($activity->ddl))}}</td>
                                    <td>{{Sentinel::findById($activity->assigned)->first_name." ".Sentinel::findById($activity->assigned)->last_name}}</td>
                                    <td>{{Sentinel::findById($activity->creator)->first_name." ".Sentinel::findById($activity->creator)->last_name}}</td>
                                    @if($activity->mentioned)
                                        <td>{{Sentinel::findById($activity->mentioned)->first_name." ".Sentinel::findById($activity->mentioned)->last_name}}</td>
                                    @else
                                        <td></td>
                                    @endif
                                    <td>{{$activity->related}}</td>
                                    <td>{{date("m/d/Y H:i:s", strtotime($activity->updated_at))}}</td>
                                    <td><a class="btn btn-success" href="{{ url('admin/'. $activity->id .'/view') }}">
                                            <i class="fa fa-search-plus "></i>
                                        </a></td>
                                    <td><button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteactivity{{ $activity->id }}">Delete
                                        </button></td>
                                </tr>
                            @else
                                <tr>
                                    <td>{{$activity->subject}}</td>
                                    @if($activity->task)
                                        <td><i class="fa fa-check-square"></i></td>
                                    @else
                                        <td><i class="fa fa-square-o"></i></td>
                                    @endif
                                    <td>{{date("m/d/Y", strtotime($activity->ddl))}}</td>
                                    <td>{{Sentinel::findById($activity->assigned)->first_name." ".Sentinel::findById($activity->assigned)->last_name}}</td>
                                    <td>{{Sentinel::findById($activity->creator)->first_name." ".Sentinel::findById($activity->creator)->last_name}}</td>
                                    @if($activity->mentioned)
                                        <td>{{Sentinel::findById($activity->mentioned)->first_name." ".Sentinel::findById($activity->mentioned)->last_name}}</td>
                                    @else
                                        <td></td>
                                    @endif
                                    <td>{{$activity->related}}</td>
                                    <td>{{date("m/d/Y H:i:s", strtotime($activity->updated_at))}}</td>
                                    <td><a class="btn btn-success"
                                           href="{{ url('admin/'. $activity->id .'/view') }}">
                                            <i class="fa fa-search-plus" style="width: 10px"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteactivity{{ $activity->id }}">
                                            <i class="fa fa-trash-o" style="width: 10px"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endif

                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div>
                    <div class="pull-right pagination">

                    </div>
                </div>
            </div>
        </div><!--/col-->

    </div><!--/row-->

    <div class="row" id="create_nav" style="display: none; visibility: hidden">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text"></i> Activities</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{ url('login') }}">Home</a></li>
                <li><i class="fa fa-folder-open"></i><a href="{{ url('admin') }}">Activities</a></li>
                <li><i class="fa fa-folder-open"></i>Create Activity</li>
            </ol>
        </div>
    </div>

    <div id="create_table" style="display: none; visibility: hidden">
        <div class="row inbox">

            <div class="col-md-3">

                <div class="panel panel-default">

                    <div class="panel-body contacts">

                        <a href="#" class="btn btn-primary btn-block">Contacts</a>

                        <ul id="contacts_list">
                            @foreach($admins as $admin)
                                <li onclick="add(this)" style="height: 50px">
                                    <div>
                                        <span class="label label-danger"></span><span>{{ Sentinel::findById($admin->user_id)->first_name." ".Sentinel::findById($admin->user_id)->last_name }}</span>
                                    </div>
                                    <div style="font-size: 12px; padding-left: 10px">{{ Sentinel::findById($admin->user_id)->email }}</div>
                                </li>
                            @endforeach
                            @foreach($managers as $manager)
                                <li onclick="add(this)" style="height: 50px">
                                    <div>
                                        <span class="label label-primary"></span><span>{{ Sentinel::findById($manager->user_id)->first_name." ".Sentinel::findById($manager->user_id)->last_name }}</span>
                                    </div>
                                    <div style="font-size: 12px; padding-left: 10px">{{ Sentinel::findById($manager->user_id)->email }}</div>
                                </li>
                            @endforeach
                            @foreach($staffs as $staff)
                                <li onclick="add(this)" style="height: 50px">
                                    <div>
                                        <span class="label label-success"></span><span>{{ Sentinel::findById($staff->user_id)->first_name." ".Sentinel::findById($staff->user_id)->last_name }}</span>
                                    </div>
                                    <div style="font-size: 12px; padding-left: 10px">{{ Sentinel::findById($staff->user_id)->email }}</div>
                                </li>
                            @endforeach
                        </ul>

                    </div>

                </div>

            </div><!--/.col-->

            <div class="col-md-9">

                <div class="panel panel-default">

                    <div class="panel-body message">

                        {!! Form::open(['url' => '/admin/activity/create', 'class' => 'form-horizontal']) !!}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="to" class="col-sm-1 control-label">To:*</label>
                            <div class="col-sm-11">
                                <input list="recipient" name="recipient" class="form-control" id="to"
                                       placeholder="Recipient"
                                       onclick="change_focus(this.id)" onfocus="this.placeholder=''"
                                       onblur="this.placeholder='Recipient'" required autocomplete="off">
                                <datalist id="recipient">
                                    @foreach($admins as $admin)
                                        <option value="{{ Sentinel::findById($admin->user_id)->email}}">{{ Sentinel::findById($admin->user_id)->first_name." ".Sentinel::findById($admin->user_id)->last_name }}</option>
                                    @endforeach
                                    @foreach($managers as $manager)
                                        <option value="{{ Sentinel::findById($manager->user_id)->email}}">{{ Sentinel::findById($manager->user_id)->first_name." ".Sentinel::findById($manager->user_id)->last_name }}</option>
                                    @endforeach
                                    @foreach($staffs as $staff)
                                        <option value="{{ Sentinel::findById($staff->user_id)->email}}">{{ Sentinel::findById($staff->user_id)->first_name." ".Sentinel::findById($staff->user_id)->last_name }}</option>
                                    @endforeach
                                </datalist>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cc" class="col-sm-1 control-label">CC:</label>
                            <div class="col-sm-11">
                                <input list="mentioned" name="mentioned" class="form-control" id="cc"
                                       placeholder="Mentioned"
                                       onclick="change_focus(this.id)" onfocus="this.placeholder=''"
                                       onblur="this.placeholder='Mentioned'">
                                <datalist id="mentioned">
                                    @foreach($admins as $admin)
                                        <option value="{{ Sentinel::findById($admin->user_id)->email}}">{{ Sentinel::findById($admin->user_id)->first_name." ".Sentinel::findById($admin->user_id)->last_name }}</option>
                                    @endforeach
                                    @foreach($managers as $manager)
                                        <option value="{{ Sentinel::findById($manager->user_id)->email}}">{{ Sentinel::findById($manager->user_id)->first_name." ".Sentinel::findById($manager->user_id)->last_name }}</option>
                                    @endforeach
                                    @foreach($staffs as $staff)
                                        <option value="{{ Sentinel::findById($staff->user_id)->email}}">{{ Sentinel::findById($staff->user_id)->first_name." ".Sentinel::findById($staff->user_id)->last_name }}</option>
                                    @endforeach
                                </datalist>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="subject" class="col-sm-1 control-label">Subject:*</label>
                            <div class="col-sm-11">
                                <input name="subject" type="text" class="form-control" id="subject"
                                       placeholder="Subject" onfocus="this.placeholder=''"
                                       onblur="this.placeholder='Subject'" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subject" class="col-sm-1 control-label">Due:</label>
                            <div class="col-sm-11">
                                <input name="ddl" type="text" class="form-control" id="ddl"
                                       placeholder="Deadline" onfocus="this.placeholder=''"
                                       onblur="this.placeholder='Deadline'">
                            </div>
                        </div>

                        <div class="col-sm-11 col-sm-offset-1">

                            <br/>

                            <div class="form-group">

                                <textarea name="message" maxlength="65535" class="form-control" id="message" name="body"
                                          rows="12"
                                          placeholder="Message" style="height: 200%" onfocus="this.placeholder=''"
                                          onblur="this.placeholder='Message'"></textarea>

                            </div>

                            <div class="form-group pull-right">
                                <a type="button" class="btn btn-default" href="{{ url('admin') }}">Cancel</a>
                                {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                                {{ Form::close() }}
                            </div>

                        </div>

                    </div>

                </div>

            </div><!--/.col-->
        </div>
    </div>

    <!-- delete activity -->
    @foreach($activities as $activity)
        <div class="modal fade" style="margin-top:10%" id="deleteactivity{{ $activity->id }}" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="">Delete Activity</h4>
                    </div>
                    <div class="modal-body">
                        <div style="padding-left: 130px">
                            <p style="font-size: 20px; color: red">Are you sure to delete ?</p>
                            <p><strong>Please confirm activity information:</strong></p>
                            <p><strong>Subject: </strong>{{$activity->subject}}</p>
                            <p><strong>Done: </strong>
                                @if($activity->task == 1)
                                    Yes
                                @else
                                    No
                                @endif
                            </p>
                            <p><strong>Due Date: </strong>{{$activity->ddl}}</p>
                            <p><strong>Last Modify
                                    date: </strong>{{date("m/d/Y H:i:s", strtotime($activity->updated_at))}}</p>
                            <p><strong>Created
                                    date: </strong>{{date("m/d/Y H:i:s", strtotime($activity->created_at))}}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group pull-right">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <a role="button" class="btn btn-danger"
                               href={{ url('/admin/'.$activity->id.'/delete') }}>Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- end delete activity -->
@stop