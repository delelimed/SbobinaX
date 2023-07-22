<?php
session_start();
include '../db_connector.php';
if (isset($_SESSION['id']) && isset($_SESSION['nome'])){

    ?>

        <?php
        $user_id = $_SESSION['id'];
        $query = "SELECT id FROM users WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $query_nome_cognome = "SELECT matricola, nome, cognome, password, malus FROM users WHERE id = ?";
        $stmt_nome_cognome = $conn->prepare($query_nome_cognome);
        $stmt_nome_cognome->bind_param('i', $user_id);
        $stmt_nome_cognome->execute();
        $result_nome_cognome = $stmt_nome_cognome->get_result();

        $row_nome_cognome = $result_nome_cognome->fetch_assoc();
        $matricola = $row_nome_cognome['matricola'];
        $nome = $row_nome_cognome['nome'];
        $cognome = $row_nome_cognome['cognome'];
        $password = $row_nome_cognome['password'];
        $malus = $row_nome_cognome['malus'];

        $stmt_nome_cognome->close();
        $stmt->close();
        $conn->close();
        ?>


    <!DOCTYPE html>
    <!--
    This is a starter template page. Use this page to start your new project from
    scratch. This page gets rid of all links and provides the needed markup only.
    -->
    <html lang="it">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SbobinaX | Dashboard</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
        <!-- daterange picker -->
        <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="../assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="../assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
        <!-- Bootstrap4 Duallistbox -->
        <link rel="stylesheet" href="../assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
        <!-- BS Stepper -->
        <link rel="stylesheet" href="../assets/plugins/bs-stepper/css/bs-stepper.min.css">
        <!-- dropzonejs -->
        <link rel="stylesheet" href="../assets/plugins/dropzone/min/dropzone.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
    </head>
    <body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <h4 style="margin-left: 10px; margin-top: 5px;">Sistema SbobinaX: fino a dove la pigrizia può spingere una persona</h4>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <span class="brand-text "><strong> SbobinaX </strong></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block"> <strong> <?php echo $_SESSION['nome'];
                                echo " ";
                                echo $_SESSION['cognome'];
                                ?> </strong> </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        <?php
                        $active_menu = 'Home';
                        $page_name = 'home.php';
                        ?>
                        <li class="nav-item">
                            <a href="../templates/home.php" class="nav-link">
                                <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'Home') : ?>
                                    <i class="nav-icon fas fa-home" aria-hidden="true"></i>
                                    <p>
                                        Home
                                    </p>
                                    <span class="badge bg-success">Active</span>
                                <?php else : ?>
                                    <i class="nav-icon fas fa-home" aria-hidden="true"></i>
                                    <p>
                                        Home
                                    </p>
                                <?php endif; ?>
                            </a>
                        </li>

                        <?php
                        $active_menu = 'Upload';
                        $page_name = 'upload.php';
                        ?>
                        <li class="nav-item">
                            <a href="../templates/upload.php" class="nav-link">
                                <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'Upload') : ?>
                                    <i class="nav-icon fa fa-upload" aria-hidden="true"></i>
                                    <p>
                                        Upload
                                    </p>
                                    <span class="badge bg-success">Active</span>
                                <?php else : ?>
                                    <i class="nav-icon fa fa-upload" aria-hidden="true"></i>
                                    <p>
                                        Upload
                                    </p>
                                <?php endif; ?>
                            </a>
                        </li>


                        <?php
                        $active_menu = 'Peer_Review';
                        $page_name = 'Peer_Review.php';
                        ?>
                        <li class="nav-item">
                            <a href="../templates/Peer_Review.php" class="nav-link">
                                <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'Peer_Review') : ?>
                                    <i class="nav-icon fa fa fa-eye" aria-hidden="true"></i>
                                    <p>
                                        Peer Review
                                    </p>
                                    <span class="badge bg-success">Active</span>
                                <?php else : ?>
                                    <i class="nav-icon fa fa fa-eye" aria-hidden="true"></i>
                                    <p>
                                        Peer Review
                                    </p>
                                <?php endif; ?>
                            </a>
                        </li>

                        <?php
                        $active_menu = 'Calendario';
                        $page_name = 'Calendario.php';
                        ?>
                        <li class="nav-item">
                            <a href="../templates/Calendario.php" class="nav-link">
                                <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'Calendario') : ?>
                                    <i class="nav-icon fa fa-calendar" aria-hidden="true"></i>
                                    <p>
                                        Calendario
                                    </p>
                                    <span class="badge bg-success">Active</span>
                                <?php else : ?>
                                    <i class="nav-icon fa fa-calendar" aria-hidden="true"></i>
                                    <p>
                                        Calendario
                                    </p>
                                <?php endif; ?>
                            </a>
                        </li>


                        <?php
                        $active_menu = 'Visualizza';
                        $page_name = 'Visualizza.php';
                        ?>
                        <li class="nav-item">
                            <a href="../templates/Visualizza.php" class="nav-link">
                                <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'Visualizza') : ?>
                                    <i class="fa fa-folder-open nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Visualizza Sbobine
                                    </p>
                                    <span class="badge bg-success">Active</span>
                                <?php else : ?>
                                    <i class="fa fa-folder-open nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Visualizza Sbobine
                                    </p>
                                <?php endif; ?>
                            </a>
                        </li>
                        <?php
                        $active_menu = 'Account';
                        $page_name = 'Account.php';
                        ?>
                        <li class="nav-item">
                            <a href="../templates/Account.php" class="nav-link">
                                <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'Account') : ?>
                                    <i class="nav-icon fas fa-user" aria-hidden="true"></i>
                                    <p>
                                        Account Utente
                                    </p>
                                    <span class="badge bg-success">Active</span>
                                <?php else : ?>
                                    <i class="nav-icon fas fa-user" aria-hidden="true"></i>
                                    <p>
                                        Account Utente
                                    </p>
                                <?php endif; ?>
                            </a>
                        </li>


                        <li class="nav-item"> <!-- impostazioni -->
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tools"></i>
                                <p>
                                    Impostazioni
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <?php
                                    $active_menu = 'Vedi_Sbobinatori';
                                    $page_name = 'Vedi_Sbobinatori.php';
                                    ?>
                                <li class="nav-item">
                                    <a href="../templates/Vedi_Sbobinatori.php" class="nav-link">
                                        <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'Vedi_Sbobinatori') : ?>
                                            <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                            <p>
                                                Visualizza Sbobinatori
                                            </p>
                                            <span class="badge bg-success">Active</span>
                                        <?php else : ?>
                                            <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                            <p>
                                                Visualizza Sbobinatori
                                            </p>
                                        <?php endif; ?>
                                    </a>
                                </li>
                        </li>
                        <li class="nav-item">
                            <?php
                            $active_menu = 'Inserisci_Sbobinatori';
                            $page_name = 'Inserisci_Sbobinatori.php';
                            ?>
                        <li class="nav-item">
                            <a href="../templates/Inserisci_Sbobinatori.php" class="nav-link">
                                <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'Inserisci_Sbobinatori') : ?>
                                    <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Inserisci Sbobinatori
                                    </p>
                                    <span class="badge bg-success">Active</span>
                                <?php else : ?>
                                    <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Inserisci Sbobinatori
                                    </p>
                                <?php endif; ?>
                            </a>
                        </li>
                        <?php
                        $active_menu = 'Inserisci_Insegnamento';
                        $page_name = 'Inserisci_Insegnamento.php';
                        ?>
                        <li class="nav-item">
                            <a href="../templates/Inserisci_Insegnamento.php" class="nav-link">
                                <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'Inserisci_Insegnamento') : ?>
                                    <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Inserisci Insegnamento
                                    </p>
                                    <span class="badge bg-success">Active</span>
                                <?php else : ?>
                                    <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Inserisci Insegnamento
                                    </p>
                                <?php endif; ?>
                            </a>
                        </li>
                        <?php
                        $active_menu = 'Visualizza_Insegnamenti';
                        $page_name = 'Visualizza_Insegnamenti.php';
                        ?>
                        <li class="nav-item">
                            <a href="../templates/Visualizza_Insegnamenti.php" class="nav-link">
                                <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'Visualizza_Insegnamenti') : ?>
                                    <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Visualizza Insegnamenti
                                    </p>
                                    <span class="badge bg-success">Active</span>
                                <?php else : ?>
                                    <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Visualizza Insegnamenti
                                    </p>
                                <?php endif; ?>
                            </a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <?php
                            $active_menu = 'Programma_Sbobine';
                            $page_name = 'Programma_Sbobine.php';
                            ?>
                        <li class="nav-item">
                            <a href="../templates/Programma_Sbobine.php" class="nav-link">
                                <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'Programma_Sbobine') : ?>
                                    <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Programma Sbobine
                                    </p>
                                    <span class="badge bg-success">Active</span>
                                <?php else : ?>
                                    <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Programma Sbobine
                                    </p>
                                <?php endif; ?>
                            </a>
                        </li>

                        <li class="nav-item">
                            <?php
                            $active_menu = 'Vedi_Programma_Sbobine';
                            $page_name = 'Vedi_Programma_Sbobine.php';
                            ?>
                        <li class="nav-item">
                            <a href="../templates/Vedi_Programma_Sbobine.php" class="nav-link">
                                <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'Vedi_Programma_Sbobine') : ?>
                                    <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Vedi Programma Sbobine
                                    </p>
                                    <span class="badge bg-success">Active</span>
                                <?php else : ?>
                                    <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Vedi Programma Sbobine
                                    </p>
                                <?php endif; ?>
                            </a>
                        </li>
                    </ul>
                    </li> <!-- impostazioni -->

                    <?php
                    $active_menu = 'Info';
                    $page_name = 'Info.php';
                    ?>
                    <li class="nav-item">
                        <a href="../templates/Info.php" class="nav-link">
                            <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'Info') : ?>
                                <i class="nav-icon fa fa-info" aria-hidden="true"></i>
                                <p>
                                    Info
                                </p>
                                <span class="badge bg-success">Active</span>
                            <?php else : ?>
                                <i class="nav-icon fa fa-info" aria-hidden="true"></i>
                                <p>
                                    Info
                                </p>
                            <?php endif; ?>
                        </a>
                    </li>


                    <li class="nav-item"> <!-- logout -->
                        <a href="../templates/logout.php" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Log Out
                        </p>
                        </a>
                    </li> <!-- logout -->




                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">ACCOUNT UTENTE - Modifica Informazioni</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">LETTURA DATABASE: In caso di errori, prenditela con chi ha inserito i dati</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form action="../req/update_password.php" method="post">
                            <?php if (isset($_GET['status'])) { ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $_GET['status']; ?>
                                </div>
                            <?php } ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="Nome">Nome</label>
                                    <input type="text" class="form-control" id="Nome" name="Nome" value="<?php echo $nome ?>" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="Cognome">Cognome</label>
                                    <input type="text" class="form-control" id="Cognome" name="Cognome" value="<?php echo $cognome ?>" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="Matricola">Matricola</label>
                                    <input type="number" class="form-control" id="Matricola" name="Matricola" value="<?php echo $matricola ?>" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="Malus">Malus</label>
                                    <input type="number" class="form-control" id="Malus" name="Malus" value="<?php echo $malus ?>" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="Password">Password</label>
                                    <input type="password" class="form-control" id="Password" name="Password" placeholder="Inserisci la nuova password">
                                </div>
                                <div class="col-sm-6">
                                    <!-- Select multiple-->
                                    <?php
                                    include '../db_connector.php';

                                    $query = "SELECT id, materia FROM insegnamenti"; // Query per ottenere gli insegnamenti dal database
                                    $result = $conn->query($query);

                                    // Controlla se ci sono risultati e assegna i risultati alla variabile $risultati
                                    if ($result->num_rows > 0) {
                                        $risultati = array(); // Inizializza l'array per contenere i risultati

                                        // Loop attraverso i risultati e aggiungili all'array $risultati
                                        while ($row = $result->fetch_assoc()) {
                                            $risultati[] = $row;
                                        }
                                    } else {
                                        $risultati = array(); // Inizializza l'array vuoto se non ci sono risultati
                                    }

                                    $queryGetSbobinePartecipanti = "SELECT id_insegnamento FROM partecipazione_sbobine WHERE id_user = ?";
                                    $stmtGetSbobinePartecipanti = $conn->prepare($queryGetSbobinePartecipanti);
                                    $stmtGetSbobinePartecipanti->bind_param('i', $user_id);
                                    $stmtGetSbobinePartecipanti->execute();
                                    $resultGetSbobinePartecipanti = $stmtGetSbobinePartecipanti->get_result();

                                    // Crea un array per memorizzare gli ID delle sbobine partecipanti
                                    $sbobinePartecipanti = array();
                                    while ($rowSbobinePartecipanti = $resultGetSbobinePartecipanti->fetch_assoc()) {
                                        $sbobinePartecipanti[] = $rowSbobinePartecipanti['id_insegnamento'];
                                    }
                                    ?>
                                    <div class="form-group" data-select2-id="43">
                                        <label>Sbobine Abilitate:</label>
                                        <select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Nessun Insegnamento Associato" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true" disabled>
                                            <?php foreach ($risultati as $row): ?>
                                                <?php
                                                // Controlla se l'ID dell'insegnamento è presente nell'array degli ID delle sbobine partecipanti
                                                $isPartecipante = in_array($row['id'], $sbobinePartecipanti);
                                                // Imposta l'attributo 'selected' per mostrare gli insegnamenti associati
                                                $selectedAttribute = $isPartecipante ? 'selected' : '';
                                                ?>
                                                <option data-select2-id="<?php echo $row['id']; ?>" <?php echo $selectedAttribute; ?>><?php echo $row['materia']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" >Aggiorna La Password</button>
                            </div>
                        </form>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Sistema SbobinaX
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2023 <a href="https://github.com/devdeleli">DEVDELELI</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="../assets/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Select2 -->
        <script src="../assets/plugins/select2/js/select2.full.min.js"></script>
        <!-- Bootstrap4 Duallistbox -->
        <script src="../assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
        <!-- InputMask -->
        <script src="../assets/plugins/moment/moment.min.js"></script>
        <script src="../assets/plugins/inputmask/jquery.inputmask.min.js"></script>
        <!-- date-range-picker -->
        <script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap color picker -->
        <script src="../assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Bootstrap Switch -->
        <script src="../assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
        <!-- BS-Stepper -->
        <script src="../assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
        <!-- dropzonejs -->
        <script src="../assets/plugins/dropzone/min/dropzone.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../assets/dist/js/adminlte.min.js"></script>
        <script>
            $(function () {
                //Initialize Select2 Elements
                $('.select2').select2()
            })

        </script>
    </body>
    </html>

    <?php
}else{
    header("Location: ../templates/login.php");
    exit();
}
?>
