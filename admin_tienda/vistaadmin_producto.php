<?php
require 'controlador/admin_productoCRUD.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Producto</title>
  <link rel="shortcut icon" href="./img/iconos/admin.png" type="image/x-icon" />
  <link rel="stylesheet" href="estilos/admin/admin_producto.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
    <!-- Navbar header-->
    <?php include("templates/cabecera.php"); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include("templates/sidebar.php"); ?>
    <!-- /.content-header -->

    <form action="" method="post" enctype="multipart/form-data">
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Producto</h5>
              <button type="reset" class="close" data-dismiss="modal" aria-label="Close" onclick="Resetpage()">

                <span aria-hidden="true">&times;</span>
              </button>
            </div> 
            <div class="modal-body">
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="">id producto</label>
                  <input type="text" class="form-control required" name="txtid_producto" value="<?php echo $txtid_producto; ?>" placeholder="" id="txtid_producto" require="" readonly onmousedown="return false;">
                </div>

                <div class="form-group col-md-12">
                  <label for="">id vendedor</label>
                  <input type="text" class="form-control <?php echo (isset($error['id_vendedor'])) ? "is-invalid" : ""; ?>" required name="txtid_vendedor" value="<?php echo $txtid_vendedor; ?>" placeholder="" id="txtid_vendedor" require="">
                  <div class="invalid-feedback">
                    <?php echo (isset($error['id_vendedor'])) ? $error['id_vendedor'] : ""; ?>
                  </div>
                  <br>
                </div>

                <div class="form-group col-md-12">
                  <label for="">nombre</label>
                  <input type="text" class="form-control <?php echo (isset($error['nombre'])) ? "is-invalid" : ""; ?>" required name="txtnombre" value="<?php echo $txtnombre; ?>" placeholder="" id="txtnombre" require="">
                  <div class="invalid-feedback">
                    <?php echo (isset($error['nombre'])) ? $error['nombre'] : ""; ?>
                  </div>
                  <br>
                </div>

                <div class="form-group col-md-12">
                  <label for="">descripcion</label>
                  <input type="text" class="form-control <?php echo (isset($error['descripcion'])) ? "is-invalid" : ""; ?>" required name="txtdescripcion" value="<?php echo $txtdescripcion; ?>" placeholder="" id="txtdescripcion" require="">
                  <div class="invalid-feedback">
                    <?php echo (isset($error['descripcion'])) ? $error['descripcion'] : ""; ?>
                  </div>
                  <br>
                </div>

                <div class="form-group col-md-4">
                  <label for="">stock</label>
                  <input type="text" class="form-control <?php echo (isset($error['stock'])) ? "is-invalid" : ""; ?>" required name="txtstock" value="<?php echo $txtstock; ?>" placeholder="" id="txtstock" require="">
                  <div class="invalid-feedback">
                    <?php echo (isset($error['stock'])) ? $error['stock'] : ""; ?>
                  </div>
                  <br>
                </div>

                <div class="form-group col-md-4">
                  <label for="">precio</label>
                  <input type="text" class="form-control <?php echo (isset($error['precio'])) ? "is-invalid" : ""; ?>" required name="txtprecio" value="<?php echo $txtprecio; ?>" placeholder="" id="txtprecio" require="">
                  <div class="invalid-feedback">
                    <?php echo (isset($error['precio'])) ? $error['precio'] : ""; ?>
                  </div>
                  <br>
                </div>

                <div class="form-group col-md-4">
                  <label for="">talla</label>
                  <input type="text" class="form-control <?php echo (isset($error['talla'])) ? "is-invalid" : ""; ?>" required name="txttalla" value="<?php echo $txttalla; ?>" placeholder="" id="txttalla" require="">
                  <div class="invalid-feedback">
                    <?php echo (isset($error['talla'])) ? $error['talla'] : ""; ?>
                  </div>
                  <br>
                </div>

                <div class="form-group col-md-6">
                  <label for="">estado</label>
                  <select name="slcestado" class="form-control " value="<?php echo $slcestado; ?>" placeholder="" id="slcestado">>
                    <option value="activo" name="activo" <?php if ($txtid_producto != null) {
                                                            if ($producto['estado'] == "Activo") {
                                                              echo 'selected ="selected"';
                                                            }
                                                          } else {
                                                            echo 'value="Activo"';
                                                          } ?>>Activo</option>
                    <option value="inactivo" name="inactivo" <?php if ($txtid_producto != null) {
                                                                if ($producto['estado'] == "inactivo") {
                                                                  echo 'selected ="selected"';
                                                                }
                                                              } else {
                                                                echo 'value="inactivo"';
                                                              } ?>>inactivo</option>
                  </select>
                </div>

                <div class="form-group col-md-6">
                  <label for="">categoria</label>
                  <select name="slccategoria" class="form-control <?php echo (isset($error['slccategoria'])) ? "is-invalid" : ""; ?>" value="<?php echo $slccategoria; ?>" placeholder="" id="slccategoria">

                    <option value="" disabled selected>elige una</option>
                    <option value="hombre" <?php if ($txtid_producto != null) {
                                              if ($producto['categoria'] == "hombre") {
                                                echo 'selected="selected"';
                                              }
                                            } else {
                                              echo 'value="hombre"';
                                            } ?>>hombre</option>
                    <option value="mujer" <?php if ($txtid_producto != null) {
                                            if ($producto['categoria'] == "mujer") {
                                              echo 'selected="selected"';
                                            }
                                          } else {
                                            echo 'value="mujer"';
                                          }  ?>>mujer</option>
                    <option value="instrumento" <?php if ($txtid_producto != null) {
                                                  if ($producto['categoria'] == "instrumento") {
                                                    echo 'selected="selected"';
                                                  }
                                                } else {
                                                  echo 'value="instrumento"';
                                                }  ?>>instrumento</option>

                  </select>
                  <div class="invalid-feedback">
                    <?php echo (isset($error['slccategoria'])) ? $error['slccategoria'] : ""; ?>
                  </div>
                </div>


                <div class="form-group col-md-12">
                  <label for="">foto</label>
                  <?php if ($txtfoto != "") { ?>
                    <br />

                    <img class="img-thumbnail rounded mx-auto d-block" width="200px" src="img/imagenes_cart/<?php echo $txtfoto; ?>" />
                    <br /><br />

                  <?php } ?>
                  <input type="file" class="form-control" accept="image/*" name="txtfoto" value="<?php echo $txtfoto; ?>" placeholder="" id="txtfoto" require="">
                  <br>
                </div>

              </div>
            </div>
            <div class="modal-footer">
              <button value="btnAgregar" <?php echo $accionAgregar; ?> class="btn btn-success" type="submit" name="accion">Agregar</button>
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
    
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="panel.php">Home</a></li>
                <li class="breadcrumb-item active">productos</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      
      
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
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                    Agregar registro +
                  </button>

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
                          <th class="headtable">estado</th>
                          <th class="headtable">Precio</th>
                          <th class="headtable">Stock</th>
                          <th class="headtable">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($listaproducto as $producto) {  ?>
                          <tr>
                            <td><img class="img-thumbnail" width="200px" src="img/imagenes_cart/<?php echo $producto['foto']; ?>"></td>
                            <td><?php echo $producto['nombre']; ?></td>
                            <td><?php echo $producto['estado'] ?></td>
                            <td>$<?php echo $producto['precio']; ?></td>
                            <td><?php echo $producto['stock']; ?></td>
                            <td class="botones"> 

                              <?php //con form y submit da la orden que tomar toda info y pasarla
                              ?>
                              <form action="" method="post">
                                <div class="pb-2"><input type="hidden" name="txtid_producto" value="<?php echo $producto['id_producto']; ?>"></div>
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

  <?php
  //funcion que hace que el modal aparezca
  if ($mostrarModal) { ?>

    <script>
      $('#exampleModal').modal('show');
    </script>
  <?php } ?>

  <script>
    function Resetpage() {
      window.location.replace("vistaadmin_producto.php");


    }
  </script>

</body>

</html>