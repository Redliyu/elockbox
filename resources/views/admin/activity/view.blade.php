@extends('layouts.dashboard')

@section('head')

@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text"></i> Activities</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{ url('login') }}">Home</a></li>
                <li><i class="fa fa-folder-open"></i>Activities</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2><i class="fa fa-table red"></i><span class="break"></span><strong>Cases</strong></h2>
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
@stop