<?php
session_start();
include "../db_connector.php";
if (isset($_SESSION['id']) && isset($_SESSION['nome']) && $_SESSION['locked'] == 0){

    ?>


    <!DOCTYPE html>

<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SbobinaX | Dashboard</title>

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
                        <h1 class="m-0">Visualizza le sbobine caricate</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">

                    </div><!-- /.col -->
                </div><!-- /.row -->
                <!-- main content -->
                <td>
                    <div class="btn-group">
                        <?php
                        // Ottieni gli insegnamenti a cui l'utente è autorizzato
                        $idUser = $_SESSION['id'];
                        $query = "SELECT i.id, i.materia FROM sx_insegnamenti AS i
                  INNER JOIN sx_partecipazione_sbobine AS p ON i.id = p.id_insegnamento
                  WHERE p.id_user = $idUser";
                        $result = $conn->query($query);

                        // Genera i bottoni in base ai risultati della query
                        while ($row = $result->fetch_assoc()) {
                            $idInsegnamento = $row['id'];
                            $nomeInsegnamento = $row['materia'];
                            echo "<button type=\"button\" class=\"btn btn-default btn-insegnamento\" data-insegnamento=\"$idInsegnamento\">$nomeInsegnamento</button>";
                        }
                        ?>
                    </div>
                </td>


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Sbobine presenti nel database</h3>

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
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Insegnamento</th>
                                        <th>Data Lezione</th>
                                        <th>Sbobinatori</th>
                                        <th>Revisori</th>
                                        <th>Argomento</th>
                                        <th>Azioni</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    // Esegui la query per ottenere i dati dalla tabella sbobine_calendarizzate
                                    $query = "SELECT sc.id AS id_lezione, sc.insegnamento, sc.argomento, sc.data_lezione, sc.posizione_server,
            GROUP_CONCAT(DISTINCT CONCAT(rv.nome, ' ', rv.cognome)) AS revisori,
            GROUP_CONCAT(DISTINCT CONCAT(sb.nome, ' ', sb.cognome)) AS sbobinatori
            FROM sx_sbobine_calendarizzate AS sc
            LEFT JOIN sx_revisori_sbobine AS rs ON sc.id = rs.id_sbobina
            LEFT JOIN sx_users AS rv ON rs.id_revisore = rv.id
            LEFT JOIN sx_sbobinatori_sbobine AS ss ON sc.id = ss.id_sbobina
            LEFT JOIN sx_users AS sb ON ss.id_sbobinatore = sb.id
            WHERE sc.revisione = 1 AND sc.caricata = 1
            GROUP BY sc.id";

                                    $result = $conn->query($query);

                                    // Genera le righe della tabella in base ai risultati della query
                                    while ($row = $result->fetch_assoc()) {
                                        $idLezione = $row['id_lezione'];
                                        $insegnamentoId = $row['insegnamento'];
                                        $dataLezione = $row['data_lezione'];
                                        $argomento = $row['argomento'];
                                        $revisori = explode(',', $row['revisori']);
                                        $sbobinatori = explode(',', $row['sbobinatori']);
                                        $posizioneServer = $row['posizione_server']; // Percorso del file sul server

                                        // Recupera il nome dell'insegnamento dalla tabella insegnamenti utilizzando l'id insegnamento
                                        $queryInsegnamento = "SELECT materia FROM sx_insegnamenti WHERE id = $insegnamentoId";
                                        $resultInsegnamento = $conn->query($queryInsegnamento);
                                        if ($resultInsegnamento->num_rows > 0) {
                                            $rowInsegnamento = $resultInsegnamento->fetch_assoc();
                                            $insegnamento = $rowInsegnamento['materia'];
                                        } else {
                                            $insegnamento = 'Insegnamento non trovato'; // Messaggio di default in caso di insegnamento non trovato
                                        }

                                        // Concatena gli sbobinatori e i revisori con la tag <br> per inserire un'interruzione di linea
                                        $sbobinatoriList = implode('<br>', $sbobinatori);
                                        $revisoriList = implode('<br>', $revisori);

                                        // Verifica se l'utente loggato è associato all'insegnamento per cui è stata fatta la sbobina
                                        $currentUserId = $_SESSION['id'];
                                        $queryPartecipazione = "SELECT * FROM sx_partecipazione_sbobine 
                    WHERE id_user = $currentUserId AND id_insegnamento = $insegnamentoId";
                                        $resultPartecipazione = $conn->query($queryPartecipazione);
                                        $canDownload = $resultPartecipazione->num_rows > 0;

                                        // Stampa la riga con sbobinatori e revisori nella stessa cella
                                        echo "<tr data-insegnamento=\"$insegnamentoId\">";
                                        echo "<td>$idLezione</td>";
                                        echo "<td>$insegnamento</td>";
                                        echo "<td>$dataLezione</td>";
                                        echo "<td>$sbobinatoriList</td>";
                                        echo "<td>$revisoriList</td>";
                                        echo "<td>$argomento</td>";
                                        echo "<td>";
                                        if ($canDownload) {
                                            echo '<a href="../req/download_fx/gestisci_download.php?id_sbobina=' . $idLezione . '&insegnamento=' . $insegnamentoId . '" class="btn btn-success btn-sm">Download</a>';
                                        } else {
                                            echo '<button class="btn btn-secondary btn-sm" disabled>Non autorizzato</button>';
                                        }
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                    </tbody>




                                </table>
                                <div id="avvisoMaschera" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 20px; background-color: #f0f0f0; border: 1px solid #ccc; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); z-index: 9999;">
                                    <p id="avvisoMessaggio"></p>
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- end main content -->
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

<!-- Includi jQuery se non è già incluso -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Aggiungi questa parte del codice JavaScript per gestire la visualizzazione della maschera -->
<script>
    $(document).ready(function() {
        // Funzione per mostrare la maschera con il messaggio di avviso
        function showAvviso(messaggio, tipo) {
            var avvisoMaschera = $('#avvisoMaschera');
            var avvisoMessaggio = $('#avvisoMessaggio');
            avvisoMessaggio.text(messaggio);

            // Applica stile per avviso di successo o di errore
            if (tipo === 'success') {
                avvisoMaschera.removeClass('avviso-errore').addClass('avviso-successo');
            } else {
                avvisoMaschera.removeClass('avviso-successo').addClass('avviso-errore');
            }

            avvisoMaschera.fadeIn(300);
            setTimeout(function() {
                avvisoMaschera.fadeOut(300);
            }, 2000); // Nascondi l'avviso dopo 2 secondi
        }

        // Funzione per gestire il click sul link di download
        $("#linkDownload").on("click", function(e) {
            e.preventDefault();
            console.log("Click sul link di download");

            if (data.authorized) {
                // Il download è autorizzato, avvia il download
                console.log("Download autorizzato");

            } else {
                // Il download non è autorizzato, mostra il messaggio di avviso
                console.log("Download non autorizzato");
                showAvviso(data.message, 'error');
            }
        });

    });
    })
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const btnsInsegnamento = document.querySelectorAll('.btn-insegnamento');
        btnsInsegnamento.forEach(btn => {
            btn.addEventListener('click', () => {
                const insegnamentoId = btn.getAttribute('data-insegnamento');
                const rows = document.querySelectorAll('.table tbody tr');
                rows.forEach(row => {
                    row.style.display = 'none';
                });
                const filteredRows = document.querySelectorAll(`.table tbody tr[data-insegnamento="${insegnamentoId}"]`);
                filteredRows.forEach(row => {
                    row.style.display = 'table-row';
                });
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







</body>
</html>
<?php
}else{
    header("Location: ../templates/login.php");
    exit();
}
    ?>