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
                        <h1 class="m-0">Invia in Revisione</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">

                    </div><!-- /.col -->
                </div><!-- /.row -->
                <!-- block content -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Upload</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <!-- Modal -->
                    <div class="modal fade" id="modalCercaSbobina" tabindex="-1" role="dialog" aria-labelledby="modalCercaSbobinaLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalCercaSbobinaLabel">Cerca Sbobina per ID</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <label>Per evitare errori nella registrazione, puoi inserire qui sotto l'id associato
                                    alla tua sbobina (lo trovi nella HOME, prima colonna). In caso di errori,
                                    potrai liberamente modificare tutti i valori. <br>
                                    La versione attuale del software non consente l'upload senza prima aver
                                    indicato l'id della sbobina. In caso di errore,
                                    ricaricare la pagina e riprovare, non forzare.</label>
                                    <div class="form-group">
                                        <label for="sbobinaId">ID Sbobina:</label>
                                        <input type="text" class="form-control" id="sbobinaId" name="sbobinaId" placeholder="Inserisci l'ID sbobina">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="cercaBtn" data-toggle="modal" data-target="#modalCercaSbobina">
                                        Cerca Sbobina
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <form action="../req/upload_fx/gestione_invio.php" method="post" id="sbobinaForm" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="Insegnamento">Insegnamento</label>
                                <select class="form-control" id="insegnamento" name="insegnamento">
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

                        <input type="hidden" id="id_sbobina" name="id_sbobina" value="">

                        <div class="form-group">
                                <label for="Argomento">Argomento</label>
                            <input type="text" class="form-control" id="argomento" name="argomento" placeholder="Inserisci l'argomento">
                            </div>

                            <!-- Assicurati di aver incluso Bootstrap e jQuery prima di aggiungere questo codice -->
                            <div class="form-group">
                                <label for="Insegnamento">Data della Lezione</label>
                                <!-- Aggiungi l'attributo "data-provide" con il valore "datepicker" per inizializzare il selettore di date -->
                                <input type="date" class="form-control datepicker" id="data_lezione" name="data_lezione" placeholder="Seleziona una data">
                            </div>

                            <div class="form-group" data-select2-id="43">
                                <label>Seleziona gli Sbobinatori</label>
                                <select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Seleziona gli sbobinatori partecipanti" style="width: 100%;" tabindex="-1" aria-hidden="true" name="sbobinatori" id="sbobinatori">
                                    <?php
                                    // Query per ottenere tutti gli utenti dal database
                                    $query = "SELECT id, nome FROM sx_users";
                                    $result = mysqli_query($conn, $query);

                                    // Ciclo attraverso i risultati della query e genero le opzioni per il menu a discesa
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . $row['id'] . '">' . $row['nome'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group" data-select2-id="43">
                                <label>Seleziona i Revisori</label>
                                <select class="select2 select2-hidden-accessible" multiple data-placeholder="Seleziona i revisori partecipanti" style="width: 100%;" tabindex="-1" aria-hidden="true" name="revisori" id="revisori">
                                    <?php
                                    // Query per ottenere tutti gli utenti dal database
                                    $query = "SELECT id, nome FROM sx_users";
                                    $result = mysqli_query($conn, $query);

                                   //  Ciclo attraverso i risultati della query e genero le opzioni per il menu a discesa
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . $row['id'] . '">' . $row['nome'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Input PDF Sbobina</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <!-- Aggiunta l'attributo "name" per permettere l'elaborazione del file -->
                                    <input type="file" class="custom-file-input" id="file_sbobina" name="file_sbobina">
                                    <label class="custom-file-label" for="exampleInputFile" id="fileLabel">Seleziona il file PDF della sbobina</label>
                                </div>
                            </div>
                        </div>

                        </div>
                        <!-- /.card-body -->
                        <div>
                            <label>ATTENZIONE! Il file caricato deve essere in PDF. E' inoltre in corso di attivazione un sistema di rilevamento automatico di IA.</label>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Invia in Revisione</button>
                        </div>
                    </form>
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
        <strong>Copyright &copy; 2023 <a href="https://devdeleli.github.io/">DEVDELELI</a>.</strong> All rights reserved.
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
    $(document).ready(function() {
        // Apri la finestra modale all'avvio della pagina
        $('#modalCercaSbobina').modal('show');

        // Popola il form con i dati trovati dopo la ricerca
        function popolaForm(idInsegnamento, dataLezione, sbobinatori, revisori, allUsers) {
            $('#insegnamento').val(idInsegnamento);
            $('#data_lezione').val(dataLezione);

            // Popolare il campo select2 "sbobinatori"
            var selectSbobinatori = $('#sbobinatori');
            selectSbobinatori.empty();

            // Popolare il campo select2 "revisori"
            var selectRevisori = $('#revisori');
            selectRevisori.empty();

            // Aggiungi tutte le opzioni di inserimento provenienti dalla tabella "users"
            allUsers.forEach(function (user) {
                var optionSbobinatori = new Option(user.nome + ' ' + user.cognome, user.id, false, false);
                var optionRevisori = new Option(user.nome + ' ' + user.cognome, user.id, false, false);

                // Controlla se l'ID dell'utente è presente nell'array degli sbobinatori e seleziona l'opzione di conseguenza
                if (sbobinatori.includes(user.id)) {
                    optionSbobinatori.setAttribute('selected', 'selected');
                }
                selectSbobinatori.append(optionSbobinatori);

                // Controlla se l'ID dell'utente è presente nell'array dei revisori e seleziona l'opzione di conseguenza
                if (revisori.includes(user.id)) {
                    optionRevisori.setAttribute('selected', 'selected');
                }
                selectRevisori.append(optionRevisori);
            });

            // Inizializza i campi select2 dopo aver aggiunto le opzioni
            selectSbobinatori.select2();
            selectRevisori.select2();
        }





        function cercaSbobina() {
            var sbobinaId = document.getElementById('sbobinaId').value;

            $.ajax({
                type: 'POST',
                url: '../req/upload_fx/cerca_sbobina.php',
                data: { sbobinaId: sbobinaId },
                success: function(response) {
                    var data = JSON.parse(response);

                    if (data.success) {
                        // ID sbobina trovato, popola il form con i dati corrispondenti
                        popolaForm(data.idInsegnamento, data.dataLezione, data.sbobinatori, data.revisori, data.allUsers);
                        $('#id_sbobina').val(sbobinaId);

                        // Chiudi la finestra modale
                        $('#modalCercaSbobina').modal('hide');
                    } else {
                        // ID sbobina non trovato, mostra un messaggio di errore o gestisci la risposta come preferisci
                        alert('Sbobina non trovata con ID: ' + sbobinaId);
                    }
                },
                error: function() {
                    alert('Errore durante la ricerca dell\'ID sbobina');
                }
            });
        }


        // Assegna la funzione cercaSbobina al pulsante "Cerca"
        $('#cercaBtn').on('click', function() {
            cercaSbobina();
        });
    });
</script>




<script>
    // Inizializza il selettore di date
    $(document).ready(function() {
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy', // Imposta il formato della data come giorno/mese/anno
            autoclose: true, // Chiude automaticamente il selettore di date dopo aver selezionato una data
            todayHighlight: true // Evidenzia la data odierna
        });
    });

    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
    })

    $(document).ready(function() {
        // Intercepisci il cambiamento dello stato della casella di controllo
        $(".form-check-input").on("change", function() {
            // Seleziona l'input nascosto
            var adminInput = $("#adminInput");

            // Imposta il valore dell'input nascosto in base alla selezione della casella di controllo
            if ($(this).is(":checked")) {
                adminInput.val("1");
            } else {
                adminInput.val("0");
            }
        });
    });

    // Aggiunge un ascoltatore per l'evento di selezione del file
    document.getElementById('exampleInputFile').addEventListener('change', function() {
        var fileName = this.value.split("\\").pop();
        var fileLabel = document.getElementById('fileLabel');
        fileLabel.innerHTML = fileName;
    });
</script>

<script>
    function cercaSbobina() {
        var sbobinaId = document.getElementById('sbobinaId').value;


        $.ajax({
            type: 'POST',
            url: '../req/upload_fx/cerca_sbobina.php',
            data: { sbobinaId: sbobinaId },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.success) {
                    // ID sbobina trovato, puoi gestire la risposta come preferisci

                    alert('Sbobina trovata con ID: ' + sbobinaId);
                    // Chiudi la finestra modale
                    $('#modalCercaSbobina').modal('hide');
                } else {
                    // ID sbobina non trovato, mostra un messaggio di errore o gestisci la risposta come preferisci
                    alert('Sbobina non trovata con ID: ' + sbobinaId);
                }
            },
            error: function() {
                alert('Errore durante la ricerca dell\'ID sbobina');
            }
        });
    }
</script>

<script>
    // Aggiungiamo un ascoltatore di eventi per il campo di input file
    const fileInput = document.getElementById('file_sbobina');
    const fileLabel = document.getElementById('fileLabel');

    fileInput.addEventListener('change', function () {
        // Quando viene selezionato un file, aggiorniamo il testo del label con il nome del file selezionato
        if (fileInput.files.length > 0) {
            fileLabel.innerText = fileInput.files[0].name;
        } else {
            fileLabel.innerText = 'Choose file';
        }
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
