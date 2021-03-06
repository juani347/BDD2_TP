<?php
include_once 'funciones/sesion-admin.php';
include_once 'templates/header.php';
try {
  include_once 'funciones/funciones.php';
} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}

$servidor= $_GET['servidor'];
$base= $_GET['base'];
$usuario = $_SESSION['usuario'];

//Asigno PRIVILEGIOS
$db_base->query("GRANT ALL PRIVILEGES ON " . $base . ".* TO '" . $usuario . "'@'" . $servidor . "'");
$db_base->query("FLUSH PRIVILEGES");

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
          Realiza consultas en la base compartida
        </h1>
      </section>
      <div class="centrar-contenido">
        <!-- Main content -->
        <div class="row col-md-6">
          <section class="content" id="contenedor">

            <!-- Default box -->
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Escriba la sentencia SQL</h3>

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
                  <form class="form-horizontal" name="consulta" id="consulta" method="post" action="control-bdd-grupal.php">
                    <div class="box-body">
                      <div class="form-group">
                        <textarea name="query" type="text" class="form-control" rows="20" id="query" placeholder=""></textarea>
                      </div>
                      <div id="error" style="display: none"></div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <input type="hidden" name="consulta" value="1">
                      <input type="hidden" name="servidor" value="<?php echo $_GET['servidor']?>">
                      <input type="hidden" name="base" value="<?php echo $_GET['base']?>">
                      <input type="hidden" name="puerto" value="<?php echo $_GET['puerto']?>">
                      <button type="submit" class="btn btn-info pull-right">Ejecutar</button>
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