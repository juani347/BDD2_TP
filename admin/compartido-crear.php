<?php
include_once 'funciones/sesion-admin.php';
include_once 'templates/header.php';
try {
	include_once 'funciones/funciones.php';
	
	$db4 = new mysqli('db4free.net','franross97',"franrossi97@gmail.com",'entorno_bdd',3306);
	
	if ($db4->connect_error){
        echo $error->$db4->connect_error;
    }
	
	$db4->set_charset('utf8');
} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}
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
          Realizar consultas
        </h1>
      </section>
      <div class="centrar-contenido">
        <!-- Main content -->
        <div class="row col-md-6">
          <section class="content" id="contenedor">

            <!-- Default box -->
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Crear base de datos compartida</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                </div>
              </div>
              <div class="box-body">
                <!-- CUERPO -->

                <div class="box box-info">
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form class="form-horizontal" name="consulta" id="consulta" method="post" action="compartido.php">
                    <div class="box-body">
                      <div class="form-group">
                        <input name="name" type="text" class="form-control" rows="20" id="name" placeholder=""></input>
                      </div>
                      <div id="error" style="display: none"></div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <input type="hidden" name="consulta" value="1">
                      <button type="submit" class="btn btn-info pull-right">Crear</button>
                    </div>
                    <!-- /.box-footer -->
                  </form>
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