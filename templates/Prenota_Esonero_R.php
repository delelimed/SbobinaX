<?php
session_start();
include '../db_connector.php';
if (isset($_SESSION['id']) && isset($_SESSION['nome'])){

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
        <title>SbobinaX | Prenota Esonero</title>

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
                            <h1 class="m-0">Prenota Esonero</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Esoneri Prenotabili</h3>

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

                                    // Verifica la connessione
                                    if ($conn->connect_error) {
                                        die("Connessione fallita: " . $conn->connect_error);
                                    }

                                    // Data odierna
                                    $currentDate = date("d-m-Y"); // Formatta la data nel formato "dd-mm-yyyy"

                                    // Query SQL per ottenere i dati dalla tabella
                                    $sql = "SELECT ex.id, ex.insegnamento, ex.docente, DATE_FORMAT(ex.data_esonero, '%d-%m-%Y') AS data_esonero, DATE_FORMAT(ex.data_scadiscrizioni, '%d-%m-%Y') AS data_scadiscrizioni, sp.matricola
        FROM sx_esamidisponibili AS ex
        LEFT JOIN sx_prenesami AS sp ON ex.id = sp.id_esame AND sp.matricola = ?
        WHERE DATE_FORMAT(ex.data_scadiscrizioni, '%d-%m-%Y') >= ?";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->bind_param("ss", $_SESSION["matricola"], $currentDate);
                                    $stmt->execute();
                                    $stmt->bind_result($id, $insegnamento, $docente, $data_esonero, $data_scadiscrizioni, $matricola);

                                    // Inizializza una variabile per verificare se hai trovato almeno un esame
                                    $almenoUnEsame = false;

                                    // Genera la tabella HTML
                                    echo '<table class="table table-hover text-nowrap">
<thead>
    <tr>
        <th>ID</th>
        <th>Insegnamento</th>
        <th>Docente</th>
        <th>Data Esonero</th>
        <th>Data Fine Prenotazione</th>
        <th>Azione</th>
    </tr>
</thead>
<tbody>';

                                    while ($stmt->fetch()) {
                                        echo '<tr>';
                                        echo '<td>' . $id . '</td>';
                                        echo '<td>' . $insegnamento . '</td>';
                                        echo '<td>' . $docente . '</td>';
                                        echo '<td>' . $data_esonero . '</td>';
                                        echo '<td>' . $data_scadiscrizioni . '</td>';

                                        if (!empty($matricola)) {
                                            echo '<td><button class="btn btn-danger elimina-button" data-id-esame="' . $id . '">Elimina</button></td>';
                                        } else {
                                            echo '<td><button class="btn btn-success prenota-button" data-id-esame="' . $id . '">Prenota</button></td>';
                                        }

                                        echo '</tr>';

                                        // Imposta la variabile a true se hai trovato almeno un esame
                                        $almenoUnEsame = true;
                                    }

                                    echo '</tbody></table>';

                                    // Mostra il messaggio "Nessun esame disponibile" se non hai trovato esami
                                    if (!$almenoUnEsame) {
                                        echo '<p>Nessun esame disponibile</p>';
                                    }

                                    // Chiudi la connessione al database
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

                    <!-- Aggiungi una nuova modale per la conferma -->
                    <div class="modal fade" id="confermaPrenotazioneModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Conferma Prenotazione</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Confermare la prenotazione?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                                    <button type="button" class="btn btn-primary" id="confermaPrenotazioneConferma">Conferma</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Finestra modale di conferma per l'eliminazione -->
                    <div class="modal fade" id="confermaEliminazioneModal" tabindex="-1" role="dialog" aria-labelledby="confermaEliminazioneModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confermaEliminazioneModalLabel">Conferma Eliminazione</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Sei sicuro di voler eliminare questa prenotazione?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                                    <button type="button" class="btn btn-danger" id="confermaEliminazione">Conferma</button>
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
            var idEsameDaConfermare = null; // Variabile per memorizzare l'ID dell'esame da confermare

            // Gestisce il clic sul pulsante "Prenota"
            $('.prenota-button').on('click', function () {
                // Recupera l'ID dell'esame dalla riga
                idEsameDaConfermare = $(this).data('id-esame');
                // Apri la modale di conferma
                $('#confermaPrenotazioneModal').modal('show');
            });

            // Gestisce il clic sul pulsante "Conferma" nella modale di conferma
            $('#confermaPrenotazioneConferma').on('click', function () {
                if (idEsameDaConfermare !== null) {
                    // Chiudi la modale di conferma
                    $('#confermaPrenotazioneModal').modal('hide');
                    // Esegui una richiesta AJAX per salvare i dati
                    $.ajax({
                        url: '../req/gestione_esoneri/salva_prenotazione_R.php', // Sostituisci con il percorso del tuo script di backend per il salvataggio
                        method: 'POST',
                        data: {
                            idEsame: idEsameDaConfermare,
                            matricola: '<?php echo $_SESSION["matricola"]; ?>',
                            nome: '<?php echo $_SESSION["nome"]; ?>',
                            cognome: '<?php echo $_SESSION["cognome"]; ?>',
                            email: '<?php echo $_SESSION["email"]; ?>',
                            dataora_prenotazione: new Date().toISOString() // Data e ora attuali
                        },
                        success: function (response) {
                            // Puoi gestire la risposta del server qui, se necessario
                            alert('Prenotazione completata con successo.');
                            // Ricarica la pagina
                            location.reload();
                        },
                        error: function () {
                            // Gestisci eventuali errori
                            alert('Errore durante la prenotazione dell\'esame.');
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            // Gestisce il clic sul pulsante "Elimina"
            $('.elimina-button').on('click', function () {
                var idEsame = $(this).data('id-esame');

                // Mostra la finestra modale di conferma
                $('#confermaEliminazioneModal').modal('show');

                // Imposta l'ID dell'esame come attributo data nella finestra modale di conferma
                $('#confermaEliminazioneModal').data('id-esame', idEsame);
            });

            // Gestisce il clic sul pulsante "Conferma" nella finestra modale di conferma
            $('#confermaEliminazione').on('click', function () {
                var idEsame = $('#confermaEliminazioneModal').data('id-esame');

                // Esegui una richiesta AJAX per eliminare l'inserimento
                $.ajax({
                    url: '../req/gestione_esoneri/elimina_prenotazione_R.php', // Sostituisci con il percorso del tuo script di eliminazione
                    method: 'POST',
                    data: {
                        idEsame: idEsame
                    },
                    success: function (response) {
                        // Chiudi la finestra modale di conferma
                        $('#confermaEliminazioneModal').modal('hide');
                        // Aggiorna la pagina o esegui altre azioni
                        window.location.reload();
                    },
                    error: function () {
                        alert('Errore durante l\'eliminazione della prenotazione.');
                    }
                });
            });

            // Altri codici JavaScript
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
    </body>
    </html>

    <?php
}else{
    header("Location: ../templates/login.php");
    exit();
}
?>
