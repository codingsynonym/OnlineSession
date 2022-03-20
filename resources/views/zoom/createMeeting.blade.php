<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ $configurations['project_name'] }} | Batches</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="{{ url('resources/assets/admin/') }}/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ url('resources/assets/admin/') }}/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{ url('resources/assets/admin/') }}/dist/css/skins/_all-skins.min.css">
  
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">


            <!-- Left side column. contains the logo and sidebar -->
            @include('admin/includes/header')
            <!-- Left side column. contains the logo and sidebar -->
            @include('admin/includes/sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <section class="content-alert">
                    <div class="row">
                        <div class="col-xs-12" style="padding: 5px 20px;">
                            @include('admin/includes/front_alerts')
                        </div>                            
                    </div>
                </section>
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Join the Meeting</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Meeting</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Meeting</h3>
                                </div>

                                <?php $meetingID = substr($result->join_url, 26, 27) ?>

                                {!! Form::open([ 'url' => 'admin/meeting-detail/'.$meetingID ]) !!}

                                <div class="box-body">
                                    <strong>Join URL: </strong><a href={{$result->join_url}}>{{$result->join_url}}</a><br/>
                                </div>

                                <div class="box-footer">
                                    <div class="box-tools pull-right">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Create</button>

                                    </div>
                                </div>
                             {!! FORM::close() !!}

                            </div>
                        </div>


                        <!-- /.col (right) -->
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.content -->
            </div>

            @include('admin/includes/footer')
        </div>
        <!-- ./wrapper -->
 <!-- jQuery 2.2.3 -->
 <script src="{{ url('resources/assets/admin/') }}/plugins/jQuery/jquery-2.2.3.min.js"></script>
 <!-- Bootstrap 3.3.6 -->
 <script src="{{ url('resources/assets/admin/') }}/bootstrap/js/bootstrap.min.js"></script>
 <!-- SlimScroll -->
 <script src="{{ url('resources/assets/admin/') }}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
 <!-- FastClick -->
 <script src="{{ url('resources/assets/admin/') }}/plugins/fastclick/fastclick.js"></script>
 <!-- AdminLTE App -->
 <script src="{{ url('resources/assets/admin/') }}/dist/js/app.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="{{ url('resources/assets/admin/') }}/dist/js/demo.js"></script>
 @include('admin/includes/scripts')
 <!-- page script -->

</body>
</html>
