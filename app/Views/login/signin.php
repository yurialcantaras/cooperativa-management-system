<?php
session_status();

// var_dump($_SESSION['permission']);
// exit;

if (isset($_SESSION['user'])) {

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cooperativa</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('tema/plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('tema/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('tema/dist/css/adminlte.min.css') ?>">
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Registro de Administrador</p>

        <form action="<?php echo base_url('/AdminController/newManager'); ?>" method="post">
          <div class="input-group mb-3">
            <input name="name" type="text" class="form-control" placeholder="Nome">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="email" type="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="password" type="password" class="form-control" placeholder="Senha">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="confirmPassword" type="password" class="form-control" placeholder="Escreva a Senha">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <select class="custom-select rounded-0" id="exampleSelectRounded0">
              <?php
              
              if ($_SESSION['permission'] === 1) {
                
                echo "
                  <option value='3'>Temporário (24h)</option>
                  <option value='2'>Administrador</option>
                  <option value='1'>Superadministrador</option>
                ";

              }elseif ($_SESSION['permission'] === 2) {
                
                echo "
                  <option value='3'>Temporário (24h)</option>
                ";

              }
              
              ?>
              
            </select>

            <!-- O campo deve mostrar apenas as opcoes que lhe pertence. -->

            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-key"></span>
              </div> 
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
            </div>
            <!-- /.col -->
          </div>  
        </form>

        <a href="<?php echo base_url('/'); ?>">Fazer Login</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="<?= base_url('tema/plugins/jquery/jquery.min.js') ?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('tema/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('tema/dist/js/adminlte.min.js') ?>"></script>
</body>

</html>

<?php

} else {

  if (session_status() === 2) {

    session_destroy();

  }

  redirect(base_url('/Pages'));

  // header('Location: '.base_url('/'));

}

?>