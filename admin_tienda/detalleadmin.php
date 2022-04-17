<?php
require('controlador/admin_perfil.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud</title>
    <link rel="shortcut icon" href="./img/iconos/admin.png" type="image/x-icon" />
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

        <?php foreach ($listaadmin as $admin) {
            if ($_SESSION['usuario'] == $admin['usuario']) {
                if ($admin['estado'] == 'admin') { ?>
                    <!-- Content Wrapper. Contains page content -->
                    <div class="content-wrapper">
                        <!-- Content Header (Page header) -->

                        <div class="content-header">
                            <div class="container-fluid">

                                <form action="" method="post" enctype="multipart/form-data">
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Usuario</h5></h5>
                                                    <button type="reset" class="close" data-dismiss="modal" aria-label="Close" onclick="Resetpage()">

                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="">id admin</label>
                                                            <input type="text" class="form-control required" name="txtid_usuario" value="<?php echo $txtid_usuario; ?>" placeholder="" id="txtid_usuario" require="" readonly onmousedown="return false;">
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label for="">foto</label>
                                                            <?php if ($txtfoto != "") { ?>
                                                                <br />

                                                                <img class="img-thumbnail rounded mx-auto d-block" width="200px" src="img/imagenes_admins/<?php echo $txtfoto; ?>" />
                                                                <br /><br />

                                                            <?php } ?>
                                                            <input type="file" class="form-control" accept="image/*" name="txtfoto" value="<?php echo $txtfoto; ?>" placeholder="" id="txtfoto" require="">
                                                            <br>
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label for="">usuario</label>
                                                            <input type="text" class="form-control <?php echo (isset($error['usuario'])) ? "is-invalid" : ""; ?>" required name="txtusuario" value="<?php echo $txtusuario; ?>" placeholder="" id="txtusuario" require="">
                                                            <div class="invalid-feedback">
                                                                <?php echo (isset($error['usuario'])) ? $error['usuario'] : ""; ?>
                                                            </div>
                                                            <br>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="">nombre</label>
                                                            <input type="text" class="form-control <?php echo (isset($error['nombre'])) ? "is-invalid" : ""; ?>" required name="txtnombre" value="<?php echo $txtnombre; ?>" placeholder="" id="txtnombre" require="">
                                                            <div class="invalid-feedback">
                                                                <?php echo (isset($error['nombre'])) ? $error['nombre'] : ""; ?>
                                                            </div>
                                                            <br>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="">Apellido</label>
                                                            <input type="text" class="form-control <?php echo (isset($error['Apellido'])) ? "is-invalid" : ""; ?>" required name="txtApellido" value="<?php echo $txtApellido; ?>" placeholder="" id="txtApellido" require="">
                                                            <div class="invalid-feedback">
                                                                <?php echo (isset($error['Apellido'])) ? $error['Apellido'] : ""; ?>
                                                            </div>
                                                            <br>
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label for="">fecha</label>
                                                            <input type="text" class="form-control <?php echo (isset($error['fecha'])) ? "is-invalid" : ""; ?>"  name="txtfecha" value="<?php echo $txtfecha; ?>" placeholder="" id="txtfecha" require="" readonly onmousedown="return false;">
                                                           
                                                            <br>
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label for="">correo</label>
                                                            <input type="text" class="form-control <?php echo (isset($error['correo'])) ? "is-invalid" : ""; ?>" required name="txtcorreo" value="<?php echo $txtcorreo; ?>" placeholder="" id="txtcorreo" require="">
                                                            <div class="invalid-feedback">
                                                                <?php echo (isset($error['correo'])) ? $error['correo'] : ""; ?>
                                                            </div>
                                                            <br>
                                                        </div>

                                                        

                                                        <div class="form-group col-md-6">
                                                            <label for="">estado</label>
                                                            <select name="slcestado" class="form-control " value="<?php echo $slcestado; ?>" placeholder="" id="slcestado">>
                                                                <option value="admin"  <?php if ($txtid_usuario != null) {
                                                                                                            if ($admin['estado'] == "admin") {
                                                                                                                echo 'selected ="selected"';
                                                                                                            }
                                                                                                        } else {
                                                                                                            echo 'value="admin"';
                                                                                                        } ?>>admin</option>
                                                                <option value="elegido"  <?php if ($txtid_usuario != null) {
                                                                                                                if ($admin['estado'] == "elegido") {
                                                                                                                    echo 'selected ="selected"';
                                                                                                                }
                                                                                                            } else {
                                                                                                                echo 'value="elegido"';
                                                                                                            } ?>>elegido</option>
                                                                <option value="inactivo"  <?php if ($txtid_usuario != null) {
                                                                                                                if ($admin['estado'] == "inactivo") {
                                                                                                                    echo 'selected ="selected"';
                                                                                                                }
                                                                                                            } else {
                                                                                                                echo 'value="inactivo"';
                                                                                                            } ?>>inactivo</option>

                                                            </select>
                                                        </div>                                                       




                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    
                                                    <button value="btnModificar" <?php echo $accionModificar; ?> class="btn btn-warning" type="submit" name="accion">Modificar</button>
                                                    <button value="btnEliminar" <?php echo $accionEliminar; ?> class="btn btn-danger" type="submit" name="accion">Eliminar</button>
                                                    <button id="cancelar" value="btnCancelar" <?php //echo $accionCancelar; 
                                                                                                ?> class="btn btn-primary" data-dismiss="modal" type="button" name="accion" onclick="Resetpage()">Cancelar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Button trigger modal -->
                                </form>




                                <section class="content">
                                    <div class="container-fluid">

                                        <!-- Main row -->
                                        <div class="row">
                                            <!-- Left col -->
                                            <div class="col-md-12">
                                                <!-- MAP & BOX PANE -->

                                                <!-- /.row -->

                                                <!-- TABLE: LATEST ORDERS -->
                                                <div class="card">
                                                    <div class="card-header border-transparent">
                                                        

                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                <i class="fas fa-minus"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body p-0">
                                                        <div class="table-responsive">
                                                            <table class="table m-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="headtable">Foto</th>
                                                                        <th class="headtable">Nombre</th>
                                                                        <th class="headtable">Apellido</th>
                                                                        <th class="headtable">Estado</th>
                                                                        <th class="headtable">Correo</th>
                                                                        <th class="headtable">Acciones</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php foreach ($listaadmin as $admin) {  ?>
                                                                        <tr>
                                                                            <td><img class="img-thumbnail" width="200px" src="img/imagenes_admins/<?php echo $admin['foto']; ?>"></td>
                                                                            <td><?php echo $admin['nombre']; ?></td>
                                                                            <td><?php echo $admin['Apellido'] ?></td>
                                                                            <td><?php echo $admin['estado']; ?></td>
                                                                            <td><?php echo $admin['correo']; ?></td>
                                                                            <td class="botones">

                                                                                <?php //con form y submit da la orden que tomar toda info y pasarla
                                                                                ?>
                                                                                <form action="" method="post">
                                                                                    <div class="pb-2"><input type="hidden" name="txtid_usuario" value="<?php echo $admin['id_usuario']; ?>"></div>
                                                                                    <div class="pb-2"><button type="submit" value="Seleccionar" class="btn btn-info" name="accion">Seleccionar</button></div>
                                                                                    <div class="pb-2"><button value="btnEliminar" type="submit" class="btn btn-danger" name="accion">Eliminar</button></div>

                                                                                </form>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- /.table-responsive -->
                                                    </div>
                                                    <!-- /.card-body -->

                                                    <!-- /.card-footer -->
                                                </div>
                                                <!-- /.card -->
                                            </div>
                                            <!-- /.col -->


                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!--/. container-fluid -->
                                </section>





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
        <?php }
            }
        } ?>


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
    <?php
  //funcion que hace que el modal aparezca
  if ($mostrarModal) { ?>

    <script>
      $('#exampleModal').modal('show');
    </script>
  <?php } ?>

  <script>
    function Resetpage() {
      window.location.replace("detalleadmin.php");


    }
  </script>

</body>

</html>