@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-plus-square-o"></i>Dropzone Upload</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="fa fa-list-alt"></i><a href="#">Forms</a></li>
                <li><i class="fa fa-plus-square-o"></i>Dropzone Upload</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2><i class="fa fa-plus-square-o red"></i><strong>Dropzone File Upload</strong></h2>
                    <div class="panel-actions">
                        <a href="form-dropzone.html#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                        <a href="form-dropzone.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                        <a href="form-dropzone.html#" class="btn-close"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="panel-body">

                    <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        Drag & drop file upload with image preview
                    </div>

                    <div class="form-group">
                        <label class="control-label">File Upload</label>
                        <div class="controls">
                            <div id="dropzone">
                                <form action="test.html" class="dropzone">
                                    <div class="fallback">
                                        <input name="file" type="file" multiple=""/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div><!--/col-->

    </div><!--/row-->


    <!-- start: JavaScript-->
    <!--[if !IE]>-->

    <script src="{{ asset('cssnew/assets/js/jquery-2.1.1.min.js') }}"></script>

    <!--<![endif]-->

    <!--[if IE]>

    <script src="{{ asset('cssnew/assets/js/jquery-1.11.1.min.js') }}"></script>

    <![endif]-->

    <!--[if !IE]>-->

    <script type="text/javascript">
        window.jQuery || document.write("<script src='{{ asset('cssnew/assets/js/jquery-2.1.1.min.js') }}'>"+"<"+"/script>");
    </script>

    <!--<![endif]-->

    <!--[if IE]>

    <script type="text/javascript">
        window.jQuery || document.write("<script src='{{ asset('cssnew/assets/js/jquery-1.11.1.min.js') }}'>"+"<"+"/script>");
    </script>

    <![endif]-->
    <script src="{{ asset('cssnew/assets/js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ asset('cssnew/assets/js/bootstrap.min.js') }}"></script>


    <!-- page scripts -->
    <script src="{{ asset('cssnew/assets/plugins/jquery-ui/js/jquery-ui-1.10.4.min.js') }}"></script>
    <script src="{{ asset('cssnew/assets/plugins/dropzone/js/dropzone.min.js') }}"></script>

    <!-- theme scripts -->
    <script src="{{ asset('cssnew/assets/js/SmoothScroll.js') }}"></script>
    <script src="{{ asset('cssnew/assets/js/jquery.mmenu.min.js') }}"></script>
    <script src="{{ asset('cssnew/assets/js/core.min.js') }}"></script>

    <!-- inline scripts related to this page -->
    <script src="{{ asset('cssnew/assets/js/pages/form-dropzone.js') }}"></script>

    <!-- end: JavaScript-->


@endsection