<?php
include_once 'funciones/sesion-admin.php';
include_once 'templates/header.php';
  include_once 'funciones/funciones.php';
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
          Comparte tu base
        </h1>
      </section>
      <div class="centrar-contenido">
        <!-- Main content -->
        <div class="row col-md-6">
          <section class="content" id="contenedor">

            <!-- Default box -->
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Compartí el siguiente enlace a otros usuarios:</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                </div>
              </div>
              <div class="box-body">
                <!-- CUERPO -->
                <div class="alert alert-info" role="alert">
                  <p>http://localhost/bdd2/BDD2_TP/admin/unirse.php?servidor=<?php echo $servidor?>&base=<?php echo $base?>&puerto=<?php echo $puerto?></p>
                </div>
                
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!--  RESULTADO ------------------------------------------------------------ -->

            <div id="resultado">

            </div> <!-- resultado -->

          </section>
          <!-- /.content -->
        </div> <!-- row -->
      </div>


    </div>
    <!-- /.content-wrapper -->

    <?php
    include_once 'templates/footer.php';
    ?>