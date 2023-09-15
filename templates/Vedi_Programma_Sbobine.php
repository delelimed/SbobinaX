<?php
session_start();
include '../db_connector.php';
if (isset($_SESSION['id']) && isset($_SESSION['nome']) && $_SESSION['admin'] == 1 && $_SESSION['locked'] == 0){

    ?>


    <!DOCTYPE html>

    <html lang="it">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SbobinaX | Vedi Sbobine</title>

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
                            <h1 class="m-0">Vedi le Sbobine in Programma</h1>
                            <button type="button" class="btn btn-primary" onclick="window.location.href='./Programma_Sbobine.php'">Nuova Sbobina</button>

                        </div><!-- /.col -->
                        <div class="col-sm-6">

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <!-- block content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Gestisci le Sbobine in Programma</h3>

                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <form id="formRicerca" method="post" action="../req/vedi_programma_sbobine_fx/ricerca_sbobine.php" class="input-group input-group-sm" style="width: 150px;">
                                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
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
                                // Dichiarazione della query SQL con un segnaposto (?)
                                $query = "SELECT * FROM `sx_sbobine_calendarizzate`";

                                // Preparazione della statement
                                $stmt = $conn->prepare($query);

                                // Esecuzione della statement
                                $stmt->execute();

                                // Associare i risultati a delle variabili
                                $result = $stmt->get_result();
                                $risultati = $result->fetch_all(MYSQLI_ASSOC);

                                // Chiusura della statement
                                $stmt->close();

                                // Chiusura della connessione al database (se necessario)
                                // $conn->close();
                                ?>

                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Progr.</th>
                                            <th>Insegnamento</th>
                                            <th>Data Lezione</th>
                                            <th>Data Caricamento</th>
                                            <th>Sbobinatori</th>
                                            <th>Revisori</th>
                                            <th>Azioni</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        // Funzione per ottenere il nome della materia dall'id insegnamento
                                        function getMateriaFromId($idInsegnamento) {
                                            include '../db_connector.php';

                                            // Esegui la query per ottenere il nome della materia
                                            $query = "SELECT materia FROM sx_insegnamenti WHERE id = ?";

                                            // Prepara la statement
                                            $stmt = $conn->prepare($query);

                                            // Associa il parametro dell'id alla statement
                                            $stmt->bind_param('i', $idInsegnamento);

                                            // Esegui la statement
                                            $stmt->execute();

                                            // Associa il risultato della query a una variabile
                                            $stmt->bind_result($materia);

                                            // Estrai il risultato della query
                                            if ($stmt->fetch()) {
                                                return $materia;
                                            } else {
                                                return 'Materia non trovata';
                                            }

                                            // Chiudi la statement
                                            $stmt->close();

                                            // Chiudi la connessione al database (se necessario)
                                            // $conn->close();
                                        }
                                        ?>

                                        <?php
                                        function getSbobinatoriFromSbobina($sbobina_id, $conn)
                                        {
                                            $sbobinatori_data = array();

                                            // Esegui la query per ottenere gli ID degli sbobinatori associati alla sbobina
                                            $query = "SELECT id_sbobinatore FROM sx_sbobinatori_sbobine WHERE id_sbobina = ?";
                                            $stmt = $conn->prepare($query);
                                            $stmt->bind_param('i', $sbobina_id);
                                            $stmt->execute();
                                            $result = $stmt->get_result();

                                            // Popola l'array con gli ID degli sbobinatori
                                            $sbobinatori_ids = array();
                                            while ($row = $result->fetch_assoc()) {
                                                $sbobinatori_ids[] = $row['id_sbobinatore'];
                                            }

                                            // Ottieni i nomi e i cognomi degli sbobinatori associati agli ID
                                            if (!empty($sbobinatori_ids)) {
                                                $sbobinatori_ids_str = implode(',', $sbobinatori_ids);
                                                $query_users = "SELECT nome, cognome FROM sx_users WHERE id IN ($sbobinatori_ids_str)";
                                                $result_users = $conn->query($query_users);

                                                // Popola l'array con i nomi completi degli sbobinatori
                                                while ($row_user = $result_users->fetch_assoc()) {
                                                    $sbobinatori_data[] = $row_user['nome'] . ' ' . substr($row_user['cognome'], 0, 1) . '.';
                                                }
                                            }

                                            return $sbobinatori_data;
                                        }
                                        ?>

                                        <?php
                                        function getRevisoriFromSbobina($sbobina_id, $conn)
                                        {
                                            $revisori_data = array();

                                            // Esegui la query per ottenere gli ID dei revisori associati alla sbobina
                                            $query = "SELECT id_revisore FROM sx_revisori_sbobine WHERE id_sbobina = ?";
                                            $stmt = $conn->prepare($query);
                                            $stmt->bind_param('i', $sbobina_id);
                                            $stmt->execute();
                                            $result = $stmt->get_result();

                                            // Popola l'array con gli ID dei revisori
                                            $revisori_ids = array();
                                            while ($row = $result->fetch_assoc()) {
                                                $revisori_ids[] = $row['id_revisore'];
                                            }

                                            // Ottieni i nomi e i cognomi dei revisori associati agli ID
                                            if (!empty($revisori_ids)) {
                                                $revisori_ids_str = implode(',', $revisori_ids);
                                                $query_users = "SELECT nome, cognome FROM sx_users WHERE id IN ($revisori_ids_str)";
                                                $result_users = $conn->query($query_users);

                                                // Popola l'array con i nomi completi dei revisori
                                                while ($row_user = $result_users->fetch_assoc()) {
                                                    $revisori_data[] = $row_user['nome'] . ' ' . substr($row_user['cognome'], 0, 1) . '.';
                                                }
                                            }

                                            return $revisori_data;
                                        }
                                        ?>


                                        <?php foreach ($risultati as $row): ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['progressivo_insegnamento']; ?></td> <!-- Qui mostriamo il progressivo_sbobina -->
                                                <td><?php echo getMateriaFromId($row['insegnamento']); ?></td>
                                                <td><?php echo $row['data_lezione']; ?></td>
                                                <td>
                                                    <?php
                                                    $dataCaricamento = $row['data_caricamento'];

                                                    if (empty($dataCaricamento) || $dataCaricamento === '0000-00-00 00:00:00') {
                                                        echo "N/D";
                                                    } else {
                                                        $formattedDate = date("d-m-Y H:i:s", strtotime($dataCaricamento));
                                                        echo $formattedDate;
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    // Ottieni i nomi completi ma solo l'iniziale del cognome degli sbobinatori associati a questa sbobina
                                                    $sbobinatori_data = getSbobinatoriFromSbobina($row['id'], $conn);
                                                    // Visualizza i nomi completi ma solo l'iniziale del cognome separati da una virgola
                                                    echo implode(", ", $sbobinatori_data);
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    // Ottieni i nomi completi ma solo l'iniziale del cognome degli sbobinatori associati a questa sbobina
                                                    $revisori_data = getRevisoriFromSbobina($row['id'], $conn);
                                                    // Visualizza i nomi completi ma solo l'iniziale del cognome separati da una virgola
                                                    echo implode(", ", $revisori_data);
                                                    ?>
                                                </td>
                                                <td>
                                                    <!-- Pulsante Modifica -->
                                                    <button class="btn btn-primary btn-sm btn-modifica"
                                                            data-id="<?php echo $row['id']; ?>"
                                                            data-insegnamento="<?php echo $row['insegnamento']; ?>"
                                                            data-data-lezione="<?php echo $row['data_lezione']; ?>">Modifica</button>

                                                    <!-- Pulsante Elimina nella riga -->
                                                    <button class="btn btn-danger btn-sm btn-elimina" data-id="<?php echo $row['id']; ?>">Elimina</button>
                                                </td>
                                            </tr>
                                            <!-- Finestra modale per la modifica -->
                                            <div id="modificaModal" class="modal fade" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modificaModalLabel">Modifica Sbobina</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="formModificaSbobina">
                                                                <input type="hidden" id="idSbobinaModifica" name="idSbobina"> <!-- Assicurati che il nome sia corretto -->

                                                                <div class="form-group">
                                                                    <label for="insegnamentoModifica">Insegnamento</label>
                                                                    <select class="form-control" id="insegnamentoModifica" name="insegnamentoModifica">
                                                                        <option value="">Seleziona l'insegnamento</option>
                                                                        <?php
                                                                        // Esegui la query per ottenere gli insegnamenti dal database
                                                                        $query = "SELECT id, materia FROM sx_insegnamenti";
                                                                        $result = $conn->query($query);

                                                                        // Popola la select con i risultati della query
                                                                        while ($row = $result->fetch_assoc()) {
                                                                            $idInsegnamento = $row['id'];
                                                                            $nomeInsegnamento = $row['materia'];
                                                                            echo "<option value=\"$idInsegnamento\">$nomeInsegnamento</option>";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="dataLezioneModifica">Data Lezione</label>
                                                                    <input type="date" class="form-control" id="dataLezioneModifica" name="dataLezioneModifica">
                                                                </div>
                                                                <?php
                                                                // Esegui la query per ottenere gli sbobinatori (utenti) dal database
                                                                $query = "SELECT id, nome FROM sx_users";
                                                                $result = $conn->query($query);

                                                                // Inizializza un array vuoto per memorizzare gli sbobinatori recuperati
                                                                $sbobinatori = array();

                                                                // Popola l'array con gli sbobinatori recuperati dalla query
                                                                while ($row = $result->fetch_assoc()) {
                                                                    $sbobinatori[] = $row;
                                                                }
                                                                ?>

                                                                <!-- Codice HTML/PHP per visualizzare gli sbobinatori nella selezione multipla -->
                                                                <div class="form-group" data-select2-id="43">
                                                                    <label>Seleziona gli Sbobinatori</label>
                                                                    <select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Seleziona gli Sbobinatori" style="width: 100%;" tabindex="-1" aria-hidden="true" name="sbobinatori[]">
                                                                        <?php foreach ($sbobinatori as $sbobinatore): ?>
                                                                            <option value="<?php echo $sbobinatore['id']; ?>"><?php echo $sbobinatore['nome']; ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>

                                                                <!-- Codice HTML/PHP per visualizzare i revisori nella selezione multipla -->
                                                                <?php
                                                                // Esegui la query per ottenere gli sbobinatori (utenti) dal database
                                                                $query = "SELECT id, nome FROM sx_users";
                                                                $result = $conn->query($query);

                                                                // Inizializza un array vuoto per memorizzare gli sbobinatori recuperati
                                                                $revisori = array();

                                                                // Popola l'array con gli sbobinatori recuperati dalla query
                                                                while ($row = $result->fetch_assoc()) {
                                                                    $revisori[] = $row;
                                                                }
                                                                ?>
                                                                <div class="form-group" data-select2-id="44">
                                                                    <label>Seleziona i Revisori</label>
                                                                    <select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Seleziona i Revisori" style="width: 100%;" tabindex="-1" aria-hidden="true" name="revisori[]">
                                                                        <?php foreach ($revisori as $revisore): ?>
                                                                            <option value="<?php echo $revisore['id']; ?>"><?php echo $revisore['nome']; ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                                                            <button id="btnSalvaModifiche" class="btn btn-primary">Salva modifiche</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Finestra modale per l'eliminazione -->
                                            <div class="modal fade" id="eliminaModal" tabindex="-1" role="dialog" aria-labelledby="eliminaModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="eliminaModalLabel">Elimina Sbobina</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Sei sicuro di voler eliminare questa sbobina?</p>
                                                            <!-- Aggiungi eventuali dettagli aggiuntivi sulla sbobina da eliminare -->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                                                            <button type="button" class="btn btn-danger" id="btnConfermaElimina">Elimina</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php endforeach; ?>

                                        </tbody>

                                    </table>

                                </div>

                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>

                    <!-- end block content -->
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
        }, 10 * 60 * 1000); // 10 minuti in millisecondi
    </script>

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
        })
    </script>

    <script>

        document.querySelectorAll('.btn-modifica').forEach(function (btn) {
            btn.addEventListener('click', function () {
                // Ottieni i dati della riga dalla riga associata al pulsante
                var idSbobina = this.getAttribute('data-id');
                var idInsegnamento = this.getAttribute('data-insegnamento');
                var dataLezione = this.getAttribute('data-data-lezione');

                // Popola il form di modifica con i dati ottenuti dalla riga
                document.getElementById('idSbobinaModifica').value = idSbobina;
                document.getElementById('insegnamentoModifica').value = idInsegnamento;
                document.getElementById('dataLezioneModifica').value = dataLezione;

                // Apri la finestra modale per la modifica
                $('#modificaModal').modal('show');
            });
        });

        document.querySelectorAll('.btn-elimina').forEach(function (btn) {
            btn.addEventListener('click', function () {
                // Ottieni l'ID sbobina dalla riga associata al pulsante
                var idSbobina = this.getAttribute('data-id');

                // Apri la finestra modale per l'eliminazione
                $('#eliminaModal').modal('show');

                // Aggiungi un gestore di eventi per il pulsante "Elimina" all'interno della finestra modale
                document.getElementById('btnConfermaElimina').addEventListener('click', function () {

                    // Chiudi la finestra modale dopo aver confermato l'eliminazione
                    $('#eliminaModal').modal('hide');


                });
            });
        });

    </script>
    <!-- Codice JavaScript per gestire i bottoni nella finestra modale per la modifica -->
    <script>
        // Codice JavaScript per gestire il click sul pulsante "Salva modifiche" nella finestra modale per la modifica
        document.getElementById('btnSalvaModifiche').addEventListener('click', function () {
            // Ottieni i dati modificati dal form
            var idSbobina = document.getElementById('idSbobinaModifica').value;
            var idInsegnamento = document.getElementById('insegnamentoModifica').value; // Cambia nome da 'nomeInsegnamento' a 'idInsegnamento'
            var dataLezione = document.getElementById('dataLezioneModifica').value;

            // Nuovo codice per ottenere il nome dell'insegnamento dall'ID
            var nomeInsegnamento = document.getElementById('insegnamentoModifica').options[document.getElementById('insegnamentoModifica').selectedIndex].text;

            // Nuovo codice per ottenere gli sbobinatori selezionati
            var selectedSbobinatori = Array.from(document.querySelectorAll('[name="sbobinatori[]"] option:checked')).map(option => option.value);
            var selectedRevisori = Array.from(document.querySelectorAll('[name="revisori[]"] option:checked')).map(option => option.value);


            // Eseguire una richiesta AJAX per salvare le modifiche e gli sbobinatori associati
            fetch('../req/vedi_programma_sbobine_fx/modifica_programma_sbobina.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'idSbobina=' + encodeURIComponent(idSbobina) + '&nomeInsegnamento=' + encodeURIComponent(nomeInsegnamento) + '&dataLezione=' + encodeURIComponent(dataLezione) + '&sbobinatori=' + encodeURIComponent(JSON.stringify(selectedSbobinatori)) + '&revisori=' + encodeURIComponent(JSON.stringify(selectedRevisori)),
            })
                .then(response => response.text())
                .then(data => {
                    // Visualizza eventuali messaggi di conferma o errore
                    alert(data);
                    // Chiudi la finestra modale dopo aver salvato le modifiche
                    $('#modificaModal').modal('hide');
                    // Aggiorna la pagina per riflettere le modifiche
                    location.reload();
                })
                .catch(error => {
                    console.error('Errore durante la richiesta di salvataggio delle modifiche:', error);
                    alert('Si è verificato un errore durante il salvataggio delle modifiche.');
                });
        });

        // Gestione del click sul pulsante "Annulla" nella finestra modale per la modifica
        document.querySelector('#modificaModal .btn-secondary').addEventListener('click', function () {
            // Chiudi la finestra modale senza salvare le modifiche
            $('#modificaModal').modal('hide');
        });
    </script>
    <script>
        // Gestione del click sul pulsante "Elimina" all'interno della finestra modale per l'eliminazione
        document.querySelectorAll('.btn-elimina').forEach(function (btn) {
            btn.addEventListener('click', function () {
                // Ottieni l'ID sbobina dalla riga associata al pulsante "Elimina"
                var idSbobina = this.getAttribute('data-id');

                // Esegui la chiamata AJAX per eliminare la sbobina
                fetch('../req/vedi_programma_sbobine_fx/elimina_programma_sbobina.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'idSbobina=' + encodeURIComponent(idSbobina),
                })
                    .then(response => response.text())
                    .then(data => {
                        // Visualizza eventuali messaggi di conferma o errore
                        alert(data);
                        // Chiudi la finestra modale dopo aver eliminato la sbobina
                        $('#eliminaModal').modal('hide');
                        // Aggiorna la pagina per riflettere la rimozione della sbobina
                        location.reload();
                    })
                    .catch(error => {
                        console.error('Errore durante la richiesta di eliminazione della sbobina:', error);
                        alert('Si è verificato un errore durante l\'eliminazione della sbobina.');
                    });
            });
        });
    </script>
    <script>
        // Codice JavaScript per gestire il click sul pulsante "Search"
        document.querySelector('.btn-default').addEventListener('click', function (event) {
            event.preventDefault(); // Ferma l'azione predefinita del pulsante

            // Ottieni il valore di ricerca inserito dall'utente
            var searchText = document.querySelector('input[name="table_search"]').value;

            // Invia la richiesta di ricerca tramite AJAX
            fetch('../req/vedi_programma_sbobine_fx/ricerca_sbobine.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'search_text=' + encodeURIComponent(searchText),
            })
                .then(response => response.text())
                .then(data => {
                    // Aggiorna la tabella con i risultati della ricerca
                    document.querySelector('tbody').innerHTML = data;
                })
                .catch(error => {
                    console.error('Errore durante la richiesta di ricerca:', error);
                    alert('Si è verificato un errore durante la ricerca degli sbobinatori.');
                });
        });

    </script>

    </body>
    </html>

    <?php
}else{
    echo 'Utente NON abilitato';
    //header("Location: ../templates/login.php");
    exit();
}
?>