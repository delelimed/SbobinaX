<?php
include '../db_connector.php';
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['nome']) && $_SESSION['admin'] == 1 && $_SESSION['locked'] == 0){

    ?>


    <!DOCTYPE html>

    <html lang="it">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SbobinaX | Vedi Sbobinatori</title>

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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

                        <li class="nav-item"> <!-- Calendario -->
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-calendar"></i>
                                <p>
                                    Calendario
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <?php
                                    $active_menu = 'Calendario';
                                    $page_name = 'Calendario.php';
                                    ?>
                                <li class="nav-item">
                                    <a href="../templates/Calendario.php" class="nav-link">
                                        <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'Calendario') : ?>
                                            <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                            <p>
                                                Visualizza Calendario
                                            </p>
                                            <span class="badge bg-success">Active</span>
                                        <?php else : ?>
                                            <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                            <p>
                                                Visualizza Calendario
                                            </p>
                                        <?php endif; ?>
                                    </a>
                                </li>
                        </li>
                        <li class="nav-item">
                            <?php
                            $active_menu = 'Prenota_Sbobina';
                            $page_name = 'Prenota_Sbobina.php';
                            ?>
                        <li class="nav-item">
                            <a href="../templates/Prenota_Sbobina.php" class="nav-link">
                                <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'Prenota_Sbobina') : ?>
                                    <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Prenota Sbobina
                                    </p>
                                    <span class="badge bg-success">Active</span>
                                <?php else : ?>
                                    <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Prenota Sbobina
                                    </p>
                                <?php endif; ?>
                            </a>
                        </li>
                        <?php
                        $active_menu = 'Richiedi_Cambio';
                        $page_name = 'Richiedi_Cambio.php';
                        ?>
                        <li class="nav-item">
                            <a href="../templates/Richiedi_Cambio.php" class="nav-link">
                                <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'Richiedi_Cambio') : ?>
                                    <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Richiedi Cambio
                                    </p>
                                    <span class="badge bg-success">Active</span>
                                <?php else : ?>
                                    <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Richiedi Cambio
                                    </p>
                                <?php endif; ?>
                            </a>
                        </li>

                        </li>

                    </ul>
                    </li> <!-- Calendario -->


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

                    <li class="nav-item"> <!-- Esoneri -->
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-calculator"></i>
                            <p>
                                Esoneri
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <?php
                                $active_menu = 'Prenota_Esonero_R';
                                $page_name = 'Prenota_Esonero_R.php';
                                ?>
                            <li class="nav-item">
                                <a href="../templates/Prenota_Esonero_R.php" class="nav-link">
                                    <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'Calendario') : ?>
                                        <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                        <p>
                                            Prenota Esonero
                                        </p>
                                        <span class="badge bg-success">Active</span>
                                    <?php else : ?>
                                        <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                        <p>
                                            Prenota Esonero
                                        </p>
                                    <?php endif; ?>
                                </a>
                            </li>
                    </li>
                    <li class="nav-item">
                        <?php
                        $active_menu = 'Gestisci_Esoneri';
                        $page_name = 'Gestisci_Esoneri.php';
                        ?>
                    <li class="nav-item">
                        <a href="../templates/Gestisci_Esoneri.php" class="nav-link">
                            <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'Prenota_Sbobina') : ?>
                                <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                <p>
                                    Gestisci Esoneri
                                </p>
                                <span class="badge bg-success">Active</span>
                            <?php else : ?>
                                <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                <p>
                                    Gestisci Esoneri
                                </p>
                            <?php endif; ?>
                        </a>
                    </li>
                    </li>

                    </ul>
                    </li> <!-- Esoneri -->

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
                                                Gestisci Sbobinatori
                                            </p>
                                            <span class="badge bg-success">Active</span>
                                        <?php else : ?>
                                            <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                            <p>
                                                Gestisci Sbobinatori
                                            </p>
                                        <?php endif; ?>
                                    </a>
                                </li>
                        </li>
                        <li class="nav-item">
                                                <?php
                        $active_menu = 'Visualizza_Insegnamenti';
                        $page_name = 'Visualizza_Insegnamenti.php';
                        ?>
                        <li class="nav-item">
                            <a href="../templates/Visualizza_Insegnamenti.php" class="nav-link">
                                <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'Visualizza_Insegnamenti') : ?>
                                    <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Gestisci Insegnamenti
                                    </p>
                                    <span class="badge bg-success">Active</span>
                                <?php else : ?>
                                    <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Gestisci Insegnamenti
                                    </p>
                                <?php endif; ?>
                            </a>
                        </li>
                        </li>
                        <li class="nav-item">

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
                                        Gestisci Sbobine
                                    </p>
                                    <span class="badge bg-success">Active</span>
                                <?php else : ?>
                                    <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Gestisci Sbobine
                                    </p>
                                <?php endif; ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <?php
                            $active_menu = 'Avanzate';
                            $page_name = 'Avanzate.php';
                            ?>
                        <li class="nav-item">
                            <a href="../templates/Avanzate.php" class="nav-link">
                                <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'Avanzate') : ?>
                                    <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Avanzate
                                    </p>
                                    <span class="badge bg-success">Active</span>
                                <?php else : ?>
                                    <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Avanzate
                                    </p>
                                <?php endif; ?>
                            </a>
                        </li>
                    <li class="nav-item">
                        <a href="../templates/Vedi_Rifiuti.php" class="nav-link">
                            <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'Avanzate') : ?>
                                <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                <p>
                                    Vedi Esiti Rifiuti
                                </p>
                                <span class="badge bg-success">Active</span>
                            <?php else : ?>
                                <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                <p>
                                    Vedi Esiti Rifiuti
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
                            <h1 class="m-0">Visualizza Sbobinatori Registrati</h1>
                            <button type="button" class="btn btn-primary" onclick="window.location.href='./Inserisci_Sbobinatori.php'">Nuovo Sbobinatore</button>

                        </div><!-- /.col -->
                        <div class="col-sm-6">

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">

                                </div><!-- /.col -->
                            </div><!-- /.row -->
                            <!-- main content -->

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title mt-1">Gestisci le anagrafiche</h3>
                                            <div class="card-tools">
                                                <div class="input-group input-group-sm" style="width: 150px;">
                                                    <form id="formRicerca" method="post" class="input-group input-group-sm" style="width: 150px;">
                                                        <input type="text" id="tableSearch" name="table_search" class="form-control float-right" placeholder="Search">
                                                            <div class="input-group-append">
                                                            <button type="submit" class="btn btn-default">
                                                                <i class="fas fa-search"></i>
                                                            </button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <?php
                                        $query = "SELECT * FROM `sx_users`";
                                        $result = $conn->query($query);
                                        $risultati = $result->fetch_all(MYSQLI_ASSOC);

                                        ?>
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-hover text-nowrap">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Matricola</th>
                                                    <th>Nome</th>
                                                    <th>Cognome</th>
                                                    <th>Malus</th>
                                                    <th>Insegnamenti</th>
                                                    <th>Azioni</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                // Query per ottenere tutti gli insegnamenti dalla tabella "insegnamenti"
                                                $query_insegnamenti_tutti = "SELECT * FROM `sx_insegnamenti`";
                                                $result_insegnamenti_tutti = $conn->query($query_insegnamenti_tutti);
                                                $insegnamenti_tutti = $result_insegnamenti_tutti->fetch_all(MYSQLI_ASSOC);
                                                ?>
                                                <?php foreach ($risultati as $row): ?>
                                                    <?php
                                                    // Ottieni gli insegnamenti associati all'utente corrente ($row['id'])
                                                    $id_utente_corrente = $row['id'];
                                                    $query_insegnamenti_utente = "SELECT i.materia, i.id FROM sx_insegnamenti i
                                  INNER JOIN sx_partecipazione_sbobine p ON i.id = p.id_insegnamento
                                  WHERE p.id_user = $id_utente_corrente";

                                                    $result_insegnamenti_utente = $conn->query($query_insegnamenti_utente);
                                                    $insegnamenti_utente = $result_insegnamenti_utente->fetch_all(MYSQLI_ASSOC);
                                                    ?>

                                                    <tr>
                                                        <td><?php echo $row['id']; ?></td>
                                                        <td><?php echo $row['matricola']; ?></td>
                                                        <td><?php echo $row['nome']; ?></td>
                                                        <td><?php echo $row['cognome']; ?></td>
                                                        <td><?php echo $row['malus']; ?></td>
                                                        <td>
                                                            <?php
                                                            // Query per recuperare gli insegnamenti associati all'utente corrente ($row['id'])
                                                            $id_utente_corrente = $row['id'];
                                                            $query_insegnamenti = "SELECT i.materia FROM sx_insegnamenti i
                                              INNER JOIN sx_partecipazione_sbobine p ON i.id = p.id_insegnamento
                                              WHERE p.id_user = $id_utente_corrente";

                                                            $result_insegnamenti = $conn->query($query_insegnamenti);

                                                            if ($result_insegnamenti->num_rows > 0) {
                                                                while ($insegnamento = $result_insegnamenti->fetch_assoc()) {
                                                                    echo $insegnamento['materia'] . '<br>';
                                                                }
                                                            } else {
                                                                echo "Nessun insegnamento associato";
                                                            }
                                                            ?>
                                                        </td>

                                                        <td>
                                                            <!-- Pulsante Modifica -->
                                                            <button type="button" class="btn btn-primary btn-modifica" data-id="<?php echo $row['id']; ?>">Modifica</button>

                                                            <!-- Pulsante Elimina -->
                                                            <button class="btn btn-danger btn-elimina" data-id="<?php echo $row['id']; ?>">Elimina</button>
                                                        </td>
                                                        <!-- Finestra modale per la modifica della riga -->
                                                        <div class="modal fade" id="modificaModal" tabindex="-1" role="dialog" aria-labelledby="modificaModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modificaModalLabel">Modifica Riga</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Chiudi">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <!-- Form per la modifica della riga -->
                                                                        <form class="modifica-form" method="post" action="../req/vedi_sbobinatori_fx/modifica_sbobinatore.php" onsubmit="return false;">
                                                                            <input type="hidden" id="idRiga" name="id" value="">
                                                                            <div class="form-group">
                                                                                <label for="matricola">Matricola</label>
                                                                                <input type="text" class="form-control" id="matricola" name="matricola" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="nome">Nome</label>
                                                                                <input type="text" class="form-control" id="nome" name="nome" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="cognome">Cognome</label>
                                                                                <input type="text" class="form-control" id="cognome" name="cognome" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="email">Email</label>
                                                                                <input type="text" class="form-control" id="email" name="email" required>
                                                                            </div>
                                                                            <?php
                                                                            // Query per recuperare il valore del malus dal database
                                                                            $sql = "SELECT malus FROM sx_users WHERE id = ?"; // Supponendo che ci sia una colonna "id" nella tabella "users"
                                                                            $stmt = $conn->prepare($sql);
                                                                            $stmt->bind_param("i", $id); // Assumendo che $id contenga l'ID dell'utente di cui vuoi recuperare il malus
                                                                            $stmt->execute();
                                                                            $stmt->bind_result($malus_value_from_database);
                                                                            $stmt->fetch();
                                                                            $stmt->close();
                                                                            ?>
                                                                            <div class="form-group">
                                                                                <label for="malus">Malus</label>
                                                                                <p id="malusValue" data-initial-malus="<?php echo (int)$malus_value_from_database; ?>"><?php echo (int)$malus_value_from_database; ?></p>
                                                                                <input type="hidden" id="malus" name="malus" value="<?php echo $malus_value_from_database; ?>">
                                                                                <button type="button" class="btn btn-primary btn-incrementa-malus">Incrementa Malus</button>
                                                                            </div>


                                                                            <div class="form-group">
                                                                                <label for="insegnamenti">Insegnamenti</label><br>
                                                                                <select id="insegnamenti-select" name="insegnamenti[]" multiple class="select2">
                                                                                    <?php foreach ($insegnamenti_tutti as $insegnamento): ?>
                                                                                        <?php
                                                                                        // Verifica se l'insegnamento è associato all'utente corrente per selezionarlo di default
                                                                                        $selected = in_array($insegnamento['id'], $insegnamenti_utente) ? 'selected' : '';
                                                                                        ?>
                                                                                        <option value="<?php echo $insegnamento['id']; ?>" <?php echo $selected; ?>>
                                                                                            <?php echo $insegnamento['materia']; ?>
                                                                                        </option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </div>




                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                                                                                <button type="button" class="btn btn-primary" id="btnConfermaModifica">Conferma</button>
                                                                            </div>
                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Finestra modale di conferma per l'eliminazione della riga -->
                                                        <div class="modal fade" id="confermaEliminazioneModal" tabindex="-1" role="dialog" aria-labelledby="confermaEliminazioneModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="confermaEliminazioneModalLabel">Conferma Eliminazione Riga</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Chiudi">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Sei sicuro di voler eliminare questa riga?</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                                                                        <button type="button" class="btn btn-danger" id="btnConfermaEliminazione">Conferma Eliminazione</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>

                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                            <!-- end main content -->
                        </div><!-- /.container-fluid -->
                    </div>
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
            <strong>Copyright &copy; 2023 <a href="https://delelimed.github.io/" target="_blank" rel="noopener noreferrer">DELELIMED</a>.</strong> All rights reserved.
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
        // Avvia il timer di 10 minuti
        var timeout = setTimeout(function() {
            // Esegui una richiesta AJAX per eseguire il logout
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "logout.php", true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Reindirizza alla pagina di login dopo il logout forzato
                    window.location.href = "login.php";
                }
            };
            xhr.send();
        }, 10 * 1000); // 10 minuti in millisecondi
    </script>

    <script>
        // Codice PHP per ottenere gli insegnamenti associati all'utente corrente
        <?php
        // Query per recuperare gli insegnamenti associati all'utente corrente ($row['id'])
        $id_utente_corrente = $row['id'];
        $query_insegnamenti = "SELECT i.materia FROM sx_insegnamenti i
                          INNER JOIN sx_partecipazione_sbobine p ON i.id = p.id_insegnamento
                          WHERE p.id_user = $id_utente_corrente";

        $result_insegnamenti = $conn->query($query_insegnamenti);

        // Crea un array con gli insegnamenti associati all'utente
        $insegnamenti_utente = array();
        while ($insegnamento = $result_insegnamenti->fetch_assoc()) {
            $insegnamenti_utente[] = $insegnamento['materia'];
        }
        ?>

        $(document).ready(function() {
            var insegnamentiUtente = <?php echo json_encode($insegnamenti_utente); ?>;
            $('#insegnamenti-select').select2({
                data: insegnamentiUtente
            });
        });
    </script>

    <!-- ... Il resto del tuo codice HTML ... -->



    </body>
    </html>
    <script>
        // Codice JavaScript per gestire l'incremento del malus e visualizzarne il valore
        document.querySelectorAll('.btn-modifica').forEach(function (btn) {
            btn.addEventListener('click', function () {
                // Ottieni l'ID dalla riga associata al pulsante
                var idRiga = this.getAttribute('data-id');

                // Ottieni i dati della riga associata al pulsante (es. matricola, nome, cognome, malus, ecc.) e imposta i valori nel form per la modifica
                var matricola = this.closest('tr').querySelector('td:nth-child(2)').innerText;
                var nome = this.closest('tr').querySelector('td:nth-child(3)').innerText;
                var cognome = this.closest('tr').querySelector('td:nth-child(4)').innerText;
                var malus = this.closest('tr').querySelector('td:nth-child(5)').innerText;

                // Imposta i valori nel form di modifica
                document.getElementById('idRiga').value = idRiga;
                document.getElementById('matricola').value = matricola;
                document.getElementById('nome').value = nome;
                document.getElementById('cognome').value = cognome;
                document.getElementById('malusValue').textContent = malus; // Imposta il valore del malus nel paragrafo


                // Apri la finestra modale per la modifica
                $('#modificaModal').modal('show');
            });
        });

        // Codice JavaScript per gestire l'incremento del malus
        document.querySelector('.btn-incrementa-malus').addEventListener('click', function () {
            var malusValue = document.getElementById('malusValue');
            var malus = parseInt(malusValue.textContent); // Ottieni il valore corrente del malus dal paragrafo

            // Incrementa il malus di 1
            malus++;

            // Aggiorna il valore del malus mostrato nel paragrafo
            malusValue.textContent = malus;
        });


        // Aggiungi un gestore di eventi per il pulsante "Elimina"
        document.querySelectorAll('.btn-elimina').forEach(function (btn) {
            btn.addEventListener('click', function () {
                // Ottieni l'ID dalla riga associata al pulsante
                var idRiga = this.getAttribute('data-id');

                // Apri la finestra modale di conferma per l'eliminazione
                if (confirm('Sei sicuro di voler eliminare questa riga?')) {
                    // Esegui l'azione di eliminazione utilizzando l'API Fetch per inviare i dati al server
                    fetch('../req/vedi_sbobinatori_fx/elimina_sbobinatore.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: 'id=' + encodeURIComponent(idRiga),
                    })
                        .then(response => response.json())
                        .then(data => {
                            // Verifica la risposta del server e mostra eventuali messaggi di conferma o errore
                            if (data.success) {
                                alert(data.message);
                                // Aggiorna la pagina o rimuovi la riga dalla tabella
                                location.reload(); // Aggiorna la pagina per mostrare i dati aggiornati
                            } else {
                                alert(data.message);
                            }
                        })
                        .catch(error => {
                            console.error('Errore durante la richiesta di eliminazione:', error);
                            alert('Si è verificato un errore durante l\'eliminazione della riga.');
                        });
                }
            });
        });
        // Aggiungi un gestore di eventi per il pulsante "Conferma" nella finestra modale per la modifica
        document.getElementById('btnConfermaModifica').addEventListener('click', function () {
            // Chiudi la finestra modale per la modifica
            $('#modificaModal').modal('hide');

            // Ottieni i dati modificati dal form di modifica
            var idRiga = document.getElementById('idRiga').value;
            var nuovaMatricola = document.getElementById('matricola').value;
            var nuovoNome = document.getElementById('nome').value;
            var nuovoCognome = document.getElementById('cognome').value;
            var nuovoMalus = document.getElementById('malusValue').textContent; // Get the value of the "malus" field from the paragraph

            // Raccogli gli insegnamenti selezionati
            const insegnamentiSelezionati = [];
            const selectedOptions = document.querySelectorAll('#insegnamenti-select option:checked');
            selectedOptions.forEach(option => {
                insegnamentiSelezionati.push(option.value);
            });

            // Esegui l'azione di eliminazione delle voci nella tabella "partecipazione_sbobine" per l'utente corrente
            fetch('../req/vedi_sbobinatori_fx/elimina_insegnamenti.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id=' + encodeURIComponent(idRiga),
            })
                .then(response => response.json())
                .then(data => {
                    // Verifica la risposta del server e mostra eventuali messaggi di conferma o errore
                    if (data.success) {
                        // Inserisci le nuove voci nella tabella "partecipazione_sbobine" con i nuovi insegnamenti selezionati
                        insegnamentiSelezionati.forEach(insegnamentoId => {
                            fetch('../req/vedi_sbobinatori_fx/inserisci_insegnamenti.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded',
                                },
                                body: 'id_user=' + encodeURIComponent(idRiga) + '&id_insegnamento=' + encodeURIComponent(insegnamentoId),
                            })
                                .then(response => response.json())
                                .then(data => {
                                    // Verifica la risposta del server e mostra eventuali messaggi di conferma o errore
                                    if (data.success) {
                                        // Successo nell'inserimento del nuovo insegnamento
                                        console.log(data.message);
                                    } else {
                                        // Errore nell'inserimento del nuovo insegnamento
                                        console.error(data.message);
                                    }
                                })
                                .catch(error => {
                                    console.error('Errore durante la richiesta di inserimento insegnamento:', error);
                                });
                        });

                        // Mostra messaggio di successo
                        alert(data.message);
                        // Aggiorna la pagina o esegui altre azioni dopo la modifica
                        location.reload(); // Aggiorna la pagina per mostrare i dati aggiornati
                    } else {
                        // Errore durante l'eliminazione delle voci
                        alert(data.message);
                    }
                })
                .catch(error => {
                    console.error('Errore durante la richiesta di eliminazione:', error);
                    alert('Si è verificato un errore durante l\'eliminazione delle voci.');
                });


            // Esegui l'azione di modifica utilizzando l'API Fetch per inviare i dati al server
            fetch('../req/vedi_sbobinatori_fx/modifica_sbobinatore.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id=' + encodeURIComponent(idRiga) + '&matricola=' + encodeURIComponent(nuovaMatricola) + '&nome=' + encodeURIComponent(nuovoNome) + '&cognome=' + encodeURIComponent(nuovoCognome) + '&malus=' + encodeURIComponent(nuovoMalus), // Include the "malus" value in the request
            })
                .then(response => response.json())
                .then(data => {
                    // Verifica la risposta del server e mostra eventuali messaggi di conferma o errore
                    if (data.success) {
                        alert(data.message);
                        // Aggiorna la pagina o esegui altre azioni dopo la modifica
                        location.reload(); // Aggiorna la pagina per mostrare i dati aggiornati
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => {
                    console.error('Errore durante la richiesta di modifica:', error);
                    alert('Si è verificato un errore durante la modifica della riga.');
                });
        });


        // Codice JavaScript per gestire l'incremento del malus
        document.addEventListener('DOMContentLoaded', function () {
            const btnIncrementaMalus = document.querySelector('.btn-incrementa-malus');
            const malusValue = document.getElementById('malusValue');

            // Ottieni il valore iniziale del malus dal paragrafo
            let malus = parseInt(malusValue.getAttribute('data-initial-malus'));

            // Funzione per aggiornare il valore del paragrafo "malusValue"
            function updateMalusValue() {
                malusValue.textContent = malus;
            }

            // Chiama la funzione per aggiornare il valore del paragrafo al caricamento della pagina
            updateMalusValue();

            // Gestisci il click sul pulsante Incrementa Malus
            btnIncrementaMalus.addEventListener('click', function () {
                // Incrementa il malus di 1
                malus++;

                // Chiama la funzione per aggiornare il valore del paragrafo con il nuovo malus
                updateMalusValue();

                // Aggiorna anche il valore del malus nel campo nascosto per inviarlo al server
                document.getElementById('malus').value = malus;
            });
        });

    </script>
    <script>
        // Al momento dell'invio del form, raccogli gli insegnamenti selezionati e imposta il campo nascosto
        document.getElementById("btnConfermaModifica").addEventListener("click", function () {
            // Raccogli gli insegnamenti selezionati
            const insegnamentiSelezionati = [];
            const checkboxes = document.querySelectorAll('input[name="insegnamenti[]"]:checked');
            checkboxes.forEach(checkbox => {
                insegnamentiSelezionati.push(checkbox.value);
            });

            // Imposta il campo nascosto con gli insegnamenti selezionati specifici per la riga
            const idRiga = document.getElementById("idRiga").value;
            document.getElementById("insegnamentiAssociati_" + idRiga).value = insegnamentiSelezionati.join(',');

            // Invia il form tramite AJAX
            const formData = new FormData(document.getElementById("formModifica"));
            fetch("../req/vedi_sbobinatori_fx/modifica_sbobinatore.php", {
                method: "POST",
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    // Gestisci la risposta del server (ad esempio, mostra un messaggio di successo o errore)
                    if (data.success) {
                        alert(data.message);
                        // Effettua altre azioni di aggiornamento, se necessario
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => {
                    console.error("Errore durante la richiesta AJAX:", error);
                });
        });
    </script>


    <!-- ricerca -->
    <script>
        // Aggiungiamo l'evento input all'input di ricerca
        const inputSearch = document.getElementById('tableSearch');
        inputSearch.addEventListener('input', function () {
            const searchText = inputSearch.value.toLowerCase(); // Ottieni il testo di ricerca in minuscolo

            // Recupera tutte le righe della tabella
            const rows = document.querySelectorAll('.table tbody tr');

            // Filtra le righe in base al testo di ricerca
            rows.forEach(row => {
                const columns = row.getElementsByTagName('td');
                let shouldShowRow = false;
                for (let i = 0; i < columns.length; i++) {
                    const columnText = columns[i].textContent.toLowerCase();
                    if (columnText.includes(searchText)) {
                        shouldShowRow = true;
                        break;
                    }
                }

                // Mostra o nascondi la riga in base al risultato del filtro
                if (shouldShowRow) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>




    <?php
}else{
    echo 'Utente NON abilitato';
    //header("Location: ../templates/login.php");
    exit();
}
?>
