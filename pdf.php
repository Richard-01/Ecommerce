<?php 
require 'controlador/pdf.php';
ob_start(); ?>
<h2>Reporte de Profesionales</h2>
 <br>  <br>


 <div class="row">
      
          <div class="col-lg-3 col-6">
            <div class="card">
            <table>
                  <tr>
                      <td>nombre</td>
                      <td>precios</td>
                      <td>telefono</td>                      
                  </tr>
                  <?php
      foreach ($listaventas as $ventas) {
          ?>
                  <tr>
                      <td><?php echo $ventas['nombre']; ?></td> 
                      <td>$<?php echo $ventas['Total']; ?></td>
                     <td> <?php echo $ventas['telefono']; ?></td>                    
                  </tr>
                  <?php }
       ?>
             
            
                </table>
               
               


              

            </div>

          </div>
     
    </div>
<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename = "factura.pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
?>