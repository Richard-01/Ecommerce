<?php
require('controlador/admin_contactus.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contactos</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader animacion -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar header-->
        <?php include("templates/cabecera.php"); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include("templates/sidebar.php"); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                            <div class="mailbox-controls">
                            <a href="contactus.php" class="btn btn-default btn-sm" ><i class="fas fa-reply"></i></a>
                            </div>
                                <div class="card-header">
                                
                                <h3 class="card-title">Lee el correo</h3>

                                    
                                </div>
                                <!-- /.card-header -->
                                <?php foreach($detallesms as $smsmas){ ?>
                                <div class="card-body p-0">
                                    <div class="mailbox-read-info">
                                        <h5>Titulo: <?php echo $smsmas['titulo']; ?></h5>
                                        <h6>From: <?php echo $smsmas['email']; ?> / <?php echo $smsmas['nombre']; ?>
                                            <span class="mailbox-read-time float-right"><?php echo $smsmas['fecha']; ?></span>
                                        </h6>
                                    </div>
                                    <!-- /.mailbox-read-info -->
                                    
                                    <!-- /.mailbox-controls -->
                                    <div class="mailbox-read-message">
                                        <p><?php echo $smsmas['mensaje']; ?></p>
                                    </div>
                                    <!-- /.mailbox-read-message -->
                                </div>
                                <?php } ?>
                                <!-- /.card-body -->
                                
                                <!-- /.card-footer -->
                                <div class="card-footer">
                                    <div class="float-right">
                                        <button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Reply</button>
                                        <button type="button" class="btn btn-default"><i class="fas fa-share"></i> Forward</button>
                                    </div>
                                    <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
                                    <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
                                </div>
                                <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <?php include("templates/footer.php"); ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js"></script>
</body>

</html>