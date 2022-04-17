<?php
require('controlador/admin_perfill.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfil</title>

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
    <link rel="stylesheet" href="estilos/admin/ventas.css">
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
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">tu perfil</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">perfil</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle" src="img/imagenes_admins/<?php foreach ($listaadmin as $admin) {
                                                                                                                            if ($_SESSION['usuario'] == $admin['usuario']) {
                                                                                                                                echo $admin['foto'];
                                                                                                                            }
                                                                                                                        } ?>" alt="User profile picture">
                                        </div>

                                        <h3 class="profile-username text-center"><?php echo $_SESSION['usuario']; ?></h3>

                                        <p class="text-muted text-center">Software Engineer</p>

                                        <ul class="list-group list-group-unbordered mb-3">
                                            <?php foreach ($listaadmin as $admin) {
                                                if ($_SESSION['usuario'] == $admin['usuario']) { ?>
                                                    <li class="list-group-item">
                                                        <b>Modificar imagen:</b>
                                                    </li>
                                                    <li class="list-group-item">

                                                        <?php if ($txtfoto != "") { ?>
                                                            <br />

                                                            <img class="img-thumbnail rounded mx-auto d-block" width="200px" src="img/imagenes_cart/<?php echo $txtfoto; ?>" />
                                                            <br /><br />

                                                        <?php } ?>
                                                        <input type="file" class="form-control" accept="image/*" name="txtfoto" value="" placeholder="" id="txtfoto" require="">
                                                    </li>
                                                    <li class="list-group-item">
                                                        <input type="hidden" name="txtid_usuario" value="<?php echo $admin['id_usuario']; ?>">
                                                    </li>
                                        </ul>

                                        <button type="submit" name="accion" href="#" class="btn btn-primary btn-block" value="modificar"><b>Guardar</b></button>
                                    </div>
                                </form>
                        <?php }
                                            } ?>
                        <!-- /.card-body -->
                            </div>
                            <!-- /.card -->


                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="settings">
                                            <?php foreach ($listaadmin as $admin) {
                                                if ($_SESSION['usuario'] == $admin['usuario']) { ?>
                                                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                                        <div class="form-group row">
                                                            <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" value="<?php echo $admin['nombre']; ?>" <?php echo $txtnombre; ?> class="form-control" id="txtnombre" name="txtnombre" placeholder="Name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputEmail" class="col-sm-2 col-form-label">Apellido</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" value="<?php echo $admin['Apellido']; ?>" <?php echo $txtApellido; ?> class="form-control" name="txtApellido" id="txtApellido" placeholder="Email">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputName2" class="col-sm-2 col-form-label">Email</label>
                                                            <div class="col-sm-10">
                                                                <input type="email" value="<?php echo $admin['correo']; ?>" <?php echo $txtcorreo; ?> class="form-control" name="txtcorreo" id="txtcorreo" placeholder="Name">
                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <div class="offset-sm-2 col-sm-10">
                                                                <input type="hidden" name="txtid_usuario" value="<?php echo $admin['id_usuario']; ?>">
                                                                <button type="submit" name="accion" value="cambiar" class="btn btn-danger">Guardar</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                            <?php }
                                            } ?>
                                        </div>
                                        <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>









                    <!-- /.col -->
                </div>
                <!-- /.row -->
        </div>
        <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
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