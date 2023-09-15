<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['nome']) && $_SESSION['admin'] == 1 && $_SESSION['locked'] == 0){

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
        <title>SbobinaX | Gestione Esoneri</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
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
                            <h1 class="m-0">Gestione Prenotazione Esoneri</h1>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuovoEsoneroModal">Nuovo Esonero</button>

                        </div><!-- /.col -->
                        <div class="col-sm-6">

                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Esoneri Inseriti</h3>

                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" id="tableSearch" name="table_search" class="form-control float-right" placeholder="Search">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <?php
                                    // Connessione al database
                                    include '../db_connector.php';

                                    // Verifica della connessione
                                    if ($conn->connect_error) {
                                        die("Connessione fallita: " . $conn->connect_error);
                                    }

                                    // Query SQL con una prepared statement
                                    $sql = "SELECT id, insegnamento, docente, data_esonero, data_scadiscrizioni FROM sx_esamidisponibili";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();
                                    $stmt->store_result();

                                    if ($stmt->num_rows > 0) {
                                        // Inizio della tabella HTML
                                        echo '<table class="table table-hover text-nowrap">';
                                        echo '<thead>';
                                        echo '<tr>';
                                        echo '<th>ID</th>';
                                        echo '<th>Insegnamento</th>';
                                        echo '<th>Docente</th>';
                                        echo '<th>Data Esonero</th>';
                                        echo '<th>Data Scadenza Iscrizioni</th>';
                                        echo '<th>Iscritti</th>';
                                        echo '<th>Azioni</th>';
                                        echo '</tr>';
                                        echo '</thead>';
                                        echo '<tbody>';

                                        // Associazione delle colonne del risultato
                                        $stmt->bind_result($id, $insegnamento, $docente, $data_esonero, $data_scadiscrizioni);

                                        // Iterazione sui risultati della query e inserimento dei dati nella tabella
                                        while ($stmt->fetch()) {
                                            echo '<tr>';
                                            echo '<td>' . $id . '</td>';
                                            echo '<td>' . $insegnamento . '</td>';
                                            echo '<td>' . $docente . '</td>';
                                            echo '<td>' . date('d-m-Y', strtotime($data_esonero)) . '</td>';
                                            echo '<td>' . date('d-m-Y', strtotime($data_scadiscrizioni)) . '</td>';

                                            // Query per contare il numero di iscritti per l'esame corrente
                                            $queryIscritti = "SELECT COUNT(*) FROM sx_prenesami WHERE id_esame = ?";
                                            $stmtIscritti = $conn->prepare($queryIscritti);
                                            $stmtIscritti->bind_param("i", $id);
                                            $stmtIscritti->execute();
                                            $stmtIscritti->bind_result($numeroIscritti);
                                            $stmtIscritti->fetch();
                                            $stmtIscritti->close();

                                            echo '<td>' . $numeroIscritti . '</td>';
                                            echo '<td>';
                                            echo '<button class="btn btn-success print-button" data-id="' . $id . '"><i class="fas fa-print"></i></button>';
                                            echo '&nbsp;';
                                            echo '<button class="btn btn-warning view-button" data-id="' . $id . '"><i class="far fa-eye"></i></button>';
                                            echo '&nbsp;';
                                            echo '<button class="btn btn-primary edit-button" data-id="' . $id . '"><i class="fas fa-edit"></i></button>';
                                            echo '&nbsp;';
                                            echo '<button class="btn btn-danger delete-button" data-id="' . $id . '"><i class="fas fa-trash"></i></button>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }

                                        // Chiusura della tabella HTML
                                        echo '</tbody>';
                                        echo '</table>';
                                    } else {
                                        echo "Nessun dato trovato nella tabella.";
                                    }

                                    // Chiusura della prepared statement e della connessione al database
                                    $stmt->close();
                                    $conn->close();
                                    ?>


                                    <div id="avvisoMaschera" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 20px; background-color: #f0f0f0; border: 1px solid #ccc; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); z-index: 9999;">
                                        <p id="avvisoMessaggio"></p>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>

                    <!-- Aggiungi questo codice HTML prima del codice PHP per mostrare la finestra modale -->
                    <div id="deleteModal" class="modal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Conferma eliminazione</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Sei sicuro di voler eliminare questo esame?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                                    <button type="button" class="btn btn-danger" id="confirmDelete">Conferma</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Aggiungi questo codice HTML prima del codice PHP per mostrare la finestra modale di modifica -->
                    <div id="editModal" class="modal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Modifica Esame</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="editForm">
                                        <div class="form-group">
                                            <label for="editInsegnamento">Insegnamento</label>
                                            <input type="text" class="form-control" id="editInsegnamento" name="editInsegnamento">
                                        </div>
                                        <div class="form-group">
                                            <label for="editDocente">Docente</label>
                                            <input type="text" class="form-control" id="editDocente" name="editDocente">
                                        </div>
                                        <div class="form-group">
                                            <label for="editDataEsonero">Data Esonero</label>
                                            <input type="date" class="form-control" id="editDataEsonero" name="editDataEsonero">
                                        </div>
                                        <div class="form-group">
                                            <label for="editDataScadiscrizioni">Data Scadenza Iscrizioni</label>
                                            <input type="date" class="form-control" id="editDataScadiscrizioni" name="editDataScadiscrizioni">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                                    <button type="button" class="btn btn-primary" id="confirmEdit">Salva Modifiche</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal" tabindex="-1" role="dialog" id="viewModal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Elenco Prenotazioni</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Qui verrà visualizzato l'elenco delle prenotazioni -->
                                    <table class="table table-bordered">
                                        <thead>

                                        </thead>
                                        <tbody id="prenotazioniBody">
                                        <!-- Qui verranno inserite le righe delle prenotazioni -->
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="nuovoEsoneroModal" tabindex="-1" role="dialog" aria-labelledby="nuovoEsoneroModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="nuovoEsoneroModalLabel">Nuovo Esonero</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form per l'inserimento dei dati -->
                                    <form id="nuovoEsoneroForm">
                                        <div class="form-group">
                                            <label for="insegnamento">Insegnamento</label>
                                            <input type="text" class="form-control" id="insegnamento" name="insegnamento" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="docente">Docente</label>
                                            <input type="text" class="form-control" id="docente" name="docente" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="data_esonero">Data Esonero</label>
                                            <input type="date" class="form-control" id="data_esonero" name="data_esonero" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="data_iscrizione">Data Scadenza Iscrizione</label>
                                            <input type="date" class="form-control" id="data_iscrizione" name="data_iscrizione" required>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                    <button type="button" class="btn btn-primary" id="salvaEsonero">Salva</button>
                                </div>
                            </div>
                        </div>
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
        $(document).ready(function () {
            // Gestisce il clic sul pulsante di eliminazione
            $('.delete-button').on('click', function () {
                var idEsame = $(this).data('id');

                // Mostra la finestra modale di conferma
                $('#deleteModal').modal('show');

                // Gestisce la conferma di eliminazione
                $('#confirmDelete').on('click', function () {
                    // Esegui la richiesta Ajax per eliminare i dati
                    $.ajax({
                        url: '../req/gestione_esoneri/elimina_esame.php', // Sostituisci con il percorso del file PHP per l'eliminazione
                        method: 'POST',
                        data: { idEsame: idEsame },
                        success: function (response) {
                            if (response === 'success') {
                                // Ricarica la pagina o esegui altre azioni dopo l'eliminazione
                                window.location.reload();
                            } else {
                                window.location.reload();
                            }
                        },
                        error: function () {
                            alert('Errore durante l\'eliminazione');
                        }
                    });
                });
            });
        });
    </script>


    <script>
        $(document).ready(function () {
            $('.print-button').on('click', function () {
                var id = $(this).data('id');

                // Esegui una richiesta AJAX per generare e scaricare il PDF
                $.ajax({
                    url: '../req/gestione_esoneri/genera_pdf.php?id=' + id, // Sostituisci con il percorso del tuo script di backend
                    method: 'GET',
                    xhrFields: {
                        responseType: 'blob' // Imposta il tipo di risposta su 'blob' per gestire i file binari
                    },
                    success: function (data) {
                        // Crea un oggetto URL per il blob restituito dal server
                        var blob = new Blob([data]);
                        var url = window.URL.createObjectURL(blob);

                        // Crea un link nascosto per il download e lo attiva
                        var a = document.createElement('a');
                        a.style.display = 'none';
                        a.href = url;
                        a.download = 'okkkkk.pdf';
                        document.body.appendChild(a);
                        a.click();

                        // Libera l'URL
                        window.URL.revokeObjectURL(url);
                    },
                    error: function () {
                        // Gestisci eventuali errori
                        alert('Errore durante la generazione del PDF.');
                    }
                });
            });
        });
    </script>


    <script>
        $(document).ready(function () {
            // Gestisce il clic sul pulsante di modifica
            $('.edit-button').on('click', function () {
                var idEsame = $(this).data('id');

                // Mostra la finestra modale di modifica
                $('#editModal').modal('show');

                // Popola i campi della finestra modale con i dati esistenti
                $.ajax({
                    url: '../req/gestione_esoneri/carica_esame.php', // Sostituisci con il percorso del file PHP per il caricamento dei dati dell'esame
                    method: 'POST',
                    data: { idEsame: idEsame },
                    success: function (response) {
                        var data = JSON.parse(response);
                        $('#editInsegnamento').val(data.insegnamento);
                        $('#editDocente').val(data.docente);
                        $('#editDataEsonero').val(data.data_esonero);
                        $('#editDataScadiscrizioni').val(data.data_scadiscrizioni);
                    },
                    error: function () {
                        alert('Errore durante il caricamento dei dati dell\'esame');
                    }
                });

                // Gestisce la conferma di modifica
                $('#confirmEdit').on('click', function () {
                    // Raccogli i dati dalla finestra modale
                    var insegnamento = $('#editInsegnamento').val();
                    var docente = $('#editDocente').val();
                    var dataEsonero = $('#editDataEsonero').val();
                    var dataScadiscrizioni = $('#editDataScadiscrizioni').val();

                    // Esegui la richiesta Ajax per salvare le modifiche
                    $.ajax({
                        url: '../req/gestione_esoneri/modifica_esame.php', // Sostituisci con il percorso del file PHP per la modifica
                        method: 'POST',
                        data: {
                            idEsame: idEsame,
                            insegnamento: insegnamento,
                            docente: docente,
                            dataEsonero: dataEsonero,
                            dataScadiscrizioni: dataScadiscrizioni
                        },
                        success: function (response) {
                            if (response === 'success') {
                                // Chiudi la finestra modale di modifica
                                $('#editModal').modal('hide');

                                // Aggiorna la pagina o esegui altre azioni dopo la modifica
                                window.location.reload();
                            } else {
                                window.location.reload();
                            }
                        },
                        error: function () {
                            alert('Errore durante la modifica3');
                        }
                    });
                });
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            // Gestisce il clic sul pulsante con classe "view-button"
            $('.view-button').on('click', function () {
                var idEsame = $(this).data('id');

                // Esegue una richiesta AJAX per ottenere le prenotazioni
                $.ajax({
                    url: '../req/gestione_esoneri/get_prenotazioni.php', // Sostituisci con il percorso del tuo script PHP per ottenere le prenotazioni
                    method: 'POST',
                    data: { idEsame: idEsame },
                    success: function (response) {
                        // Popola la tabella delle prenotazioni con la risposta ottenuta
                        $('#prenotazioniBody').html(response);

                        // Mostra la finestra modale
                        $('#viewModal').modal('show');
                    },
                    error: function () {
                        alert('Errore durante il recupero delle prenotazioni.');
                    }
                });
            });
        });

    </script>


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

    <script>
        $(document).ready(function () {
            // Gestisci il clic sul pulsante "Salva"
            $('#salvaEsonero').on('click', function () {
                // Raccogli i dati dal modulo
                var insegnamento = $('#insegnamento').val();
                var docente = $('#docente').val();
                var data_esonero = $('#data_esonero').val();
                var data_iscrizione = $('#data_iscrizione').val();

                // Esegui una richiesta AJAX per inviare i dati al tuo script di backend
                $.ajax({
                    url: '../req/gestione_esoneri/nuovo_esonero.php', // Sostituisci con il percorso del tuo script di backend
                    method: 'POST',
                    data: {
                        insegnamento: insegnamento,
                        docente: docente,
                        data_esonero: data_esonero,
                        data_iscrizione: data_iscrizione
                    },
                    success: function (response) {
                        // Chiudi la modale
                        $('#nuovoEsoneroModal').modal('hide');
                        // Aggiorna la pagina o effettua altre azioni
                        window.location.reload();
                    },
                    error: function () {
                        // Gestisci eventuali errori
                        alert('Errore durante il salvataggio dell\'esonero.');
                    }
                });
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
