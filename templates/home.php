<meta name="robots" content="noindex">
<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['nome']) && $_SESSION['locked'] == 0){

    ?>


<!DOCTYPE html>

<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="../manifest.json">
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
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: rgb(10,43,62);">
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
                                <i class="nav-icon fas fa-home active" aria-hidden="true"></i>
                                <p>
                                    Home
                                </p>
                                <span class="badge bg-success">Active</span>
                            <?php else : ?>
                                <i class="nav-icon fas fa-home active" aria-hidden="true"></i>
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
    <div class="modal fade" id="avvisoModal" tabindex="-1" role="dialog" aria-labelledby="avvisoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="avvisoModalLabel">Avviso Update Piattaforma V2.5</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Caro Sbobinatore,
                    a partire dal giorno 23/02 e fino al 03/03 incluso la piattaforma sarà 
                    offline per la rimozione delle sbobine attuali e la preparazione al nuovo semestre.
                    Inoltre, verrà eseguito un aggiornamento software della piattaforma completa,
                    con l'introduzione di alcune novità, come la modifica del turno in autonomia 
                    (con coerenza di insegnamento), la segnalazione delle sbobine fatte male, delle
                    lezioni non svolte per assenza del professore ed il blocco automatico dell'account 
                    al superamento non giustificato del limite massimo di ritardo concesso.
                    E.d.R.
                   
                </div>
            </div>
        </div>
    </div>
    


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">HOME</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">

                    </div><!-- /.col -->
                </div><!-- /.row -->
                <!-- block content -->
                <?php include '../req/home_fx.php'; ?>

                <div class="row">
                    <div class="col-md-3">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo $num_sbobine_pronte; ?></h3>
                                <p>Sbobine Caricate</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fa fa-upload"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                Visibili in Piattaforma <i class=></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?php echo $num_sbobine_da_revisionare; ?></h3>
                                <p>Sbobine in Peer Review</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fa fa fa-eye"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                Sistema Disabilitato <i class=></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?php echo $num_sbobine_da_svolgere; ?></h3>
                                <p>Sbobine da Svolgere</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-radiation-alt"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                Non caricate <i class=></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?php echo $num_sbobine; ?></h3>
                                <p>Sbobine Totali Presenti</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-folder-open nav-icon"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                Calendarizzate, in revisione, pronte <i class=></i>
                            </a>
                        </div>

                    </div>

                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Sbobine Assegnate</h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="cd-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Insegnamento</th>
                                    <th>Data Lezione</th>
                                    <th>Status</th>
                                    <th>Sbobinatori</th>
                                    <th>Revisori</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tbody id="sbobine-body">


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
            Sistema SbobinaX v2.2 HT-res
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2023 <a href="https://delelimed.github.io/" target="_blank" rel="noopener noreferrer">DELELIMED</a>.</strong> All rights reserved.
    </footer>
</div>

<!-- Modal -->
<div class="modal fade" id="sbobinaRifiutataModal" tabindex="-1" aria-labelledby="sbobinaRifiutataModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sbobinaRifiutataModalLabel"> <b>Avviso di Sbobina Rifiutata </b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                if (isset($_SESSION['messaggio_sbobina_rifiutata']) && !empty($_SESSION['messaggio_sbobina_rifiutata'])) {
                    $messaggioSbobinaRifiutata = $_SESSION['messaggio_sbobina_rifiutata'];

                    // Recupera l'ID della sbobina dalla sessione
                    $idSbobina = $_SESSION['id_sbobina'];

                    // Include il file di connessione al database
                    include "../db_connector.php";

                    // Query per ottenere materia e data della lezione dalla tabella "sx_sbobine_calendarizzate" (utilizzo di prepared statement)
                    $queryLezione = "SELECT insegnamento, data_lezione FROM sx_sbobine_calendarizzate WHERE id = ?";

                    // Creazione della prepared statement
                    $stmtLezione = $conn->prepare($queryLezione);

                    // Associazione del parametro
                    $stmtLezione->bind_param('i', $idSbobina);

                    // Esecuzione della query
                    $stmtLezione->execute();

                    // Ottieni il risultato
                    $resultLezione = $stmtLezione->get_result();

                    if ($resultLezione->num_rows === 1) {
                        $rowLezione = $resultLezione->fetch_assoc();
                        $insegnamentoLezione = $rowLezione['insegnamento'];
                        $dataLezione = date('d-m-Y', strtotime($rowLezione['data_lezione'])); // Formatta la data come "DD-MM-YYYY"

                        // Query per ottenere materia dalla tabella "sx_insegnamenti" in base all'ID dell'insegnamento (utilizzo di prepared statement)
                        $queryMateria = "SELECT materia FROM sx_insegnamenti WHERE id = ?";

                        // Creazione della prepared statement
                        $stmtMateria = $conn->prepare($queryMateria);

                        // Associazione del parametro
                        $stmtMateria->bind_param('i', $insegnamentoLezione);

                        // Esecuzione della query
                        $stmtMateria->execute();

                        // Ottieni il risultato
                        $resultMateria = $stmtMateria->get_result();

                        if ($resultMateria->num_rows === 1) {
                            $rowMateria = $resultMateria->fetch_assoc();
                            $materiaLezione = $rowMateria['materia'];
                        }

                        // Recupera altre informazioni necessarie
                        $nomeUtente = $_SESSION['nome'];
                        $idRevisore = $_SESSION['id_revisore']; // Recupera l'ID del revisore dalla sessione

                        // Query per ottenere nome e cognome del revisore (utilizzo di prepared statement)
                        $queryRevisore = "SELECT nome, cognome FROM sx_users WHERE id = ?";

                        // Creazione della prepared statement
                        $stmtRevisore = $conn->prepare($queryRevisore);

                        // Associazione del parametro
                        $stmtRevisore->bind_param('i', $idRevisore);

                        // Esecuzione della query
                        $stmtRevisore->execute();

                        // Ottieni il risultato
                        $resultRevisore = $stmtRevisore->get_result();

                        if ($resultRevisore->num_rows === 1) {
                            $rowRevisore = $resultRevisore->fetch_assoc();
                            $nomeRevisore = $rowRevisore['nome'];
                            $cognomeRevisore = $rowRevisore['cognome'];

                            // Messaggio personalizzato
                            $messaggioPersonalizzato = "Ciao $nomeUtente!
            Ti informo che il revisore $nomeRevisore $cognomeRevisore ha rigettato la tua sbobina di $materiaLezione della lezione del $dataLezione con la seguente motivazione:

            $messaggioSbobinaRifiutata.

            Per ulteriori informazioni, puoi contattare direttamente il revisore.
            Dopo la revisione, ti invito a caricarla nuovamente.
            Buon Lavoro!";

                            echo '<div class="alert alert-warning">' . nl2br($messaggioPersonalizzato) . '</div>';
                        }
                    }

                    // Chiudi le prepared statement
                    $stmtLezione->close();
                    $stmtMateria->close();
                    $stmtRevisore->close();

                    // Chiudi la connessione al database
                    $conn->close();
                }
                ?>





            </div>
        </div>
    </div>
</div>

<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- Include jQuery library if not already included -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
            $('#avvisoModal').modal('show');
        });
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
    $(document).ready(function() {
        $.ajax({
            url: "../req/home_fx/get_tue_sbobine.php",
            type: "GET",
            dataType: "json",
            success: function(data) {
                // Popola la tabella con i dati ricevuti
                var sbobineTableBody = $("#sbobine-body");
                $.each(data, function(index, sbobina) {
                    // Effettua una seconda chiamata AJAX per ottenere il valore della colonna "materia"
                    $.ajax({
                        url: "../req/home_fx/get_insegnamento.php?id=" + sbobina.insegnamento,
                        type: "GET",
                        dataType: "json",
                        success: function(insegnamentoData) {
                            // Effettua una terza chiamata AJAX per ottenere i nomi degli sbobinatori
                            $.ajax({
                                url: "../req/home_fx/get_sbobinatori_names.php",
                                type: "GET",
                                data: { sbobinatori_ids: sbobina.sbobinatori_ids },
                                dataType: "json",
                                success: function(sbobinatoriData) {
                                    // Effettua una quarta chiamata AJAX per ottenere i nomi dei revisori
                                    $.ajax({
                                        url: "../req/home_fx/get_revisori_names.php",
                                        type: "GET",
                                        data: { sbobina_id: sbobina.id },
                                        dataType: "json",
                                        success: function(revisoriData) {
                                            var sbobinatoriNames = sbobinatoriData.join(", ");
                                            var revisoriNames = revisoriData.join(", ");
                                            var row = $("<tr>");
                                            row.append($("<td>").text(sbobina.id));
                                            row.append($("<td>").text(insegnamentoData.materia));
                                            row.append($("<td>").text(new Date(sbobina.data_lezione).toLocaleDateString('it-IT')));
                                            row.append($("<td>").text(sbobina.status));
                                            row.append($("<td>").text(sbobinatoriNames));
                                            row.append($("<td>").text(revisoriNames));
                                            sbobineTableBody.append(row);
                                        },
                                        error: function(xhr, status, error) {
                                            console.error("Errore durante il recupero dei nomi dei revisori:", error);
                                        }
                                    });
                                },
                                error: function(xhr, status, error) {
                                    console.error("Errore durante il recupero dei nomi degli sbobinatori:", error);
                                }
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error("Errore durante il recupero dei dati dell'insegnamento:", error);
                        }
                    });
                });
            },
            error: function(xhr, status, error) {
                console.error("Errore durante il recupero dei dati:", error);
            }
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        // Attiva il popup modale se c'è un messaggio nella sessione
        <?php
        if (isset($_SESSION['messaggio_sbobina_rifiutata']) && !empty($_SESSION['messaggio_sbobina_rifiutata'])) {
            echo '$("#sbobinaRifiutataModal").modal("show");';
        }
        ?>
    });
</script>

</body>
</html>

<?php

}elseif ($_SESSION['locked'] == 1) {
    echo "Risulta che tu abbia superato il numero massimo di malus. Il tuo account è stato disabilitato.";
    exit();
}
else
{
    header("Location: ../templates/login.php");
    exit();
}
    ?>
