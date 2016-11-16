@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text"></i> View Cases</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{ url('login') }}">Home</a></li>
                <li><i class="fa fa-folder"></i>Case Management</li>
                <li><i class="fa fa-file-text"></i>View Cases</li>
            </ol>
        </div>
    </div>

    @foreach($data as $data)
    {{ $data->id }}
    @endforeach
@endsection