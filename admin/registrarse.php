<?php
  session_start();
  $out= isset($_GET['out']);  //isset evita el mensaje de error en caso de que out no exista
  if ($out){
    session_destroy();
  }
  include_once 'templates/header.php';
?>

<body class="hold-transition login-page">
<!-- Site wrapper -->
<div class="wrapper">


<div class="login-box">
  <div class="login-logo">
    <a href="../index.php"><b>Entorno de práctica </b>BDD</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Nuevo usuario</p>

    <form name="registrarse" id="registrarse" method="post" action="registrarse.php">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
        <span class="form-control-feedback"><i class="fa fa-user"></i></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="pass" name="password" placeholder="Contraseña">
        <span class="form-control-feedback"><i class="fa fa-unlock-alt"></i></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="password_repit" name="password_repit" placeholder="Repetir contraseña">
        <span class="form-control-feedback"><i class="fa fa-unlock-alt"></i></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <input type="hidden" name="registrarse" value="1">
          <button type="submit" class="btn btn-primary btn-block btn-flat">INICIAR SESIÓN</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <a href="login-admin.php">Iniciar sesión</a><br>


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php
  include_once 'templates/footer.php';
?>
