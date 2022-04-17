<?php
require('controlador/admin_template.php');

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="panel.php" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Administrador</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="img/imagenes_admins/<?php foreach($listaadmin as $admin){ if ($_SESSION['usuario']==$admin['usuario']){ echo $admin['foto'];}}?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="perfil.php" class="d-block"><?php echo $_SESSION['usuario'] ?></a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open">
          <a href="panel.php" class="nav-link ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              inicio

            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="vistaadmin_producto.php" class="nav-link ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Productos

            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="ventas.php" class="nav-link ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Ventas

            </p>
          </a>
        </li>
        <?php foreach($listaadmin as $admin){
          if ($_SESSION['usuario']==$admin['usuario']){
        if($admin['estado']=='admin'){ ?>
        <li class="nav-item menu-open">
          <a href="detalleadmin.php" class="nav-link ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Admins

            </p>
          </a>
        </li>
        <?php }}}?>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>