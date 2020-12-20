<?php
include_once 'funciones/sesion-admin.php';
include_once 'templates/header.php';
try {
  include_once 'funciones/funciones.php';
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
         Template CRUD
        </h1>
      </section>
<div class="centrar-contenido">
 <!-- Main content -->
 <div class="row col-md-7">
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Ejemplo para crear tablas y realizar consultas</h3>

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
                <form class="form-horizontal" name="template" id="" method="post" action="">
                  <div class="box-body">
                    <div class="form-group">
                      <textarea name="ejemplo" type="text" class="form-control" rows="20" id="ejempl" placeholder="">
                      CREATE TABLE IF NOT EXIST 'Empleados'
                        (
                            'id_empleado' int(6) unsigned NOT NULL,
                            'nombre' varchar(30) unsigned NOT NULL,
                            'apellido' varchar(30) unsigned NOT NULL,
                            'mail' varchar(30) unsigned NOT NULL,
                            'sueldo' float unsigned NOT NULL,
                            'id_departamento' int(4) unsigned NOT NULL,
                            PRIMARY KEY ('id_empleado')
                        )


                        INSERT INTO 'Empleados' ('id_empleado','nombre','apellido','sueldo' ,'mail','id_departamento') VALUES
                            (1,'Franco','Martinez',76000,'franmart99@gmail.com',2)
                            (2,'Juan','López',70000,'juanlop3z98@gmail.com',1)
                            (3,'Gregorio','Marquez',62000,'gregmarquez@hotmail.com',2)
                            (4,'Manuel','Barré',48000,'manubarre@gmail.com',3)


                        SELECT *
                        FROM Empleados e
                        WHERE e.nombre='Franco'

                        SELECT *
                        FROM Empleados e
                        WHERE e.sueldo < (SELECT AVG(r.sueldo) FROM Empleados r)

                      </textarea>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <!-- /.box-footer -->
                </form>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </section>
        <!-- /.content -->
      </div> <!-- row -->
</div>
     

    </div>
    <!-- /.content-wrapper -->

    <?php
    include_once 'templates/footer.php';
    ?>