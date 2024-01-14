<!DOCTYPE html>
<meta name="robots" content="noindex">
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SbobinaX | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/dist/css/style.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <img src="../assets/dist/img/logo.png" style="width:200px;height:200px;">
        <a>Sbobina<b>X</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Inserisci le credenziali per entrare</p>

            <form class="login"
                  method="post"
                  action="../req/login_fx/login.php">

                <?php if (isset($_GET['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_GET['error']; ?>
                    </div>
                <?php } ?>

                <div class="input-group mb-3">
                    <input type="number" class="form-control" placeholder="Matricola" name="uname">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">LogIn</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
    <div style="margin-top: 20px;"></div>
    <button type="button"  class="btn btn-info btn-block" onclick="window.location.href='./Prenota_Esonero.php'">Prenota Esonero (Non presente su IS)</button>
	<button type="button" class="btn btn-success btn-block" data-bs-toggle="modal" data-bs-target="#myModal">
    Avanzate (nel senso che non sapevo dove metterle)
  </button>
<button type="button" class="btn btn-primary btn-block" style="background-color: #3498db; border-color: #3498db;" onclick="window.location.href='https://www.youtube.com/watch?v=dQw4w9WgXcQ&pp=ygUJcmljayByb2xs'">FANTASANREMO</button>
</div>

<!-- /.login-box -->

<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Seleziona un'opzione:</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <button type="button" class="btn btn-success" onclick="window.location.href='https://calendar.google.com/calendar/embed?src=c_h3k36q41lqnqt3q3gorgfcnqvs%40group.calendar.google.com&ctz=Europe%2FRome'">Apri il calendario</button>
          <button type="button" class="btn btn-primary" onclick="window.location.href='https://drive.google.com/drive/folders/1QQiyUMkPm3Z-kwBS69zM6DV4svvdWHGU?usp=drive_link'">Apri il Drive del Corso</button>
        </div>
      </div>
    </div>
  </div>

<!-- jQuery -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
</body>
</html>

