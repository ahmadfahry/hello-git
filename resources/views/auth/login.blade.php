<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD'S</title>
    <link type="text/css" href="{{url('admin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{url('admin/bootstrap/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{url('admin/css/theme.css')}}" rel="stylesheet">
    <link type="text/css" href="{{url('admin/images/icons/css/font-awesome.css')}}" rel="stylesheet">
     <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>

    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <i class="icon-reorder shaded"></i>
                </a>

                <a class="brand" href="{{url('/')}}">
<<<<<<< HEAD
                    SIAKAD SABILILLAH - Sistem Informasi Akademik SMA SABILILLAH
                </a>

                <div class="nav-collapse collapse navbar-inverse-collapse">
                    <ul class="nav pull-right">                 
=======
                    SISTEM INFORMASI AKADEMIK NIH
                </a>

                <div class="nav-collapse collapse navbar-inverse-collapse">
                    <ul class="nav pull-right">
>>>>>>> f3eb10f09dd57efcd5d488f6e752f3fc2773237e
                        <li><a href="#">
                          <?php date_default_timezone_set("Asia/Jakarta");
                          echo date('Y-m-d H:i');
                          ?>
                        </a></li>
                    </ul>
                </div><!-- /.nav-collapse -->
            </div>
        </div><!-- /navbar-inner -->
    </div><!-- /navbar -->



    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="module module-login span4 offset4">
                    <form class="form-vertical" action="{{url('user/login')}}" method="POST">
                        @csrf
                        <div class="module-head">
                            <h3>Masuk</h3>
                             @if($message=Session::get('success'))
                            <div class="alert bg-teal" role="alert">
<<<<<<< HEAD
                                <em class="fa fa-lg fa-check">&nbsp;</em> 
=======
                                <em class="fa fa-lg fa-check">&nbsp;</em>
>>>>>>> f3eb10f09dd57efcd5d488f6e752f3fc2773237e
                               <p style="color: red">{{$message}}</p>
                            </div>
                            @endif
                        </div>
                        <div class="module-body">
                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <input class="span12" type="text" id="inputEmail" name="username" placeholder="Masukan NIM / NIP / Username">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <input class="span12" type="password" id="inputPassword" name="password" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <div class="module-foot">
                            <div class="control-group">
                                <div class="controls clearfix">
                                    <button type="submit" class="btn btn-primary pull-right">Masuk</button>
<<<<<<< HEAD
                                   
                                       Silahkan Hubungi Admin Jurusan Jika Tidak Memiliki Akses
                                  
=======

                                       Silahkan Hubungi Admin Jurusan Jika Tidak Memiliki Akses

>>>>>>> f3eb10f09dd57efcd5d488f6e752f3fc2773237e
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/.wrapper-->

    <div class="footer">
        <div class="container">
<<<<<<< HEAD
             
=======

>>>>>>> f3eb10f09dd57efcd5d488f6e752f3fc2773237e

            <b class="copyright">&copy; {{date('Y')}} SIAKADS</b> All rights reserved.
        </div>
    </div>
    <script src="{{url('admin/scripts/jquery-1.9.1.min.js')}}" type="text/javascript"></script>
    <script src="{{url('admin/scripts/jquery-ui-1.10.1.custom.min.js')}}" type="text/javascript"></script>
    <script src="{{url('admin/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<<<<<<< HEAD
</body>
=======
</body>
>>>>>>> f3eb10f09dd57efcd5d488f6e752f3fc2773237e
