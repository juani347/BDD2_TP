<?php
  include_once 'funciones/sesion-admin.php';
  include_once 'templates/header.php';

?>

<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <?php
      include_once 'templates/barra.php';
  ?>

  <!-- =============================================== -->
<?php
  include_once 'templates/navegacion.php';
?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Historial de consultas
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row centrar-contenido">
        <div class="col-md-12">
            <!-- BOX ADMIN SISTEMA -->
            <div class="box">
              <!-- /.box-header -->
              <div class="box-body">
                <table id="registros" class="table table-bordered table-striped text-center">
                  <thead>
                  <tr>
                    <th class="col-md-2">Fecha</th>
                    <th class="col-md-2">Hora</th>
                    <th class="col-md-2">Base</th>
                    <th class="col-md-6">Consulta</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php
                  try{
                    include_once 'funciones/funciones.php';
                    $sql= "
                    SELECT r.fecha, r.hora, r.consulta, r.base
                    FROM registro r
                    WHERE r.id_user=". $id_user ."
                    ORDER BY r.fecha, r.hora";
                    $tuplas= $db_base->query($sql);
                  }catch(Exception $e){
                    echo "Error: " . $e->getMessage();
                  }

                  while ($registro= $tuplas->fetch_assoc()){
                  ?>
                  <tr>
                    <td><?php echo utf8_encode(strftime("%d-%m-%Y", strtotime($registro['fecha']))); ?></td>
                    <td> <?php echo date_format(date_create($registro['hora']), 'H:i'); ?></td>
                    <td> <?php echo $registro['base']; ?></td>
                    <td> <?php echo $registro['consulta']; ?></td>
                  </tr>
                  <?php
                  }
                  ?>
                  </tr>
                  
                  </tfoot>
                </table>
              </div>
            <!-- /.box-body -->
            </div>
          <!-- /.box -->
          <a class="btn btn-info pull-right" href="pdf.php"><i class="fa fa-download"></i> Descargar archivo PDF</a>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
  include_once 'templates/footer.php';
?>
