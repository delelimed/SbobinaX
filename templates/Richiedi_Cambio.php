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
                            <h1 class="m-0">Richiedi Cambio Turno</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">

                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Dati della Sbobina</h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="cd-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Id Sbobina</th>
                                    <th>Insegnamento</th>
                                    <th>Data Lezione</th>
                                    <th>Sbobinatori</th>
                                    <th>Revisori</th>
                                    <th>Richiedi Cambio</th>
                                </tr>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>


                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->


            <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Inserisci l'ID Sbobina</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <input type="text" id="inputID" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="cercaSbobina()">Conferma</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                        </div>
                    </div>
                </div>
            </div>



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
        }, 10 * 60 * 1000); // 10 minuti in millisecondi
    </script>

    <script>
        function apriFinestraModale() {
            $('#myModal').modal('show');
        }

        // Chiamare la funzione per aprire la finestra modale all'avvio della pagina
        $(document).ready(function () {
            apriFinestraModale();
        });

        function cercaSbobina() {
            // Ottieni l'id_sbobina dalla casella di input
            var idSbobina = document.getElementById("inputID").value;

            // Effettua una richiesta AJAX al tuo server per ottenere i dati
            // Sostituisci 'URL_DEL_TUO_ENDPOINT' con l'URL del tuo endpoint API
            fetch('../req/richiedi_cambio/trova_sbobina.php?id_sbobina=' + idSbobina)
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) {
                    // Popola la tabella con i dati ricevuti
                    var tableBody = document.querySelector(".cd-body table tbody");
                    tableBody.innerHTML = ""; // Cancella il contenuto precedente della tabella

                    data.forEach(function(row) {
                        var newRow = tableBody.insertRow(tableBody.rows.length);
                        var idCell = newRow.insertCell(0);
                        var insegnamentoCell = newRow.insertCell(1);
                        var dataLezioneCell = newRow.insertCell(2);
                        var sbobinatoriCell = newRow.insertCell(3); // Cella per i sbobinatori
                        var revisoriCell = newRow.insertCell(4); // Cella per i revisori
                        var azioneCell = newRow.insertCell(5); // Cella per l'azione (pulsante "richiedi")

                        idCell.innerHTML = idSbobina;

                        // Chiamata a trova_materia per ottenere la materia basata sull'insegnamento
                        fetch('../req/richiedi_cambio/trova_materia.php?insegnamento=' + row.insegnamento)
                            .then(function(response) {
                                return response.text();
                            })
                            .then(function(materia) {
                                insegnamentoCell.innerHTML = materia; // Mostra la materia anziché l'insegnamento
                            })
                            .catch(function(error) {
                                console.error('Errore durante la richiesta per la materia:', error);
                            });

                        // Formatta la data nel formato "dd-mm-yyyy"
                        var dataLezione = new Date(row.data_lezione);
                        var giorno = String(dataLezione.getDate()).padStart(2, '0');
                        var mese = String(dataLezione.getMonth() + 1).padStart(2, '0');
                        var anno = dataLezione.getFullYear();
                        var dataFormattata = giorno + '-' + mese + '-' + anno;

                        dataLezioneCell.innerHTML = dataFormattata;

                        // Chiamata a trova_sbobinatori per ottenere gli sbobinatori basati sull'id_sbobina
                        fetch('../req/richiedi_cambio/trova_sbobinatori.php?id_sbobina=' + idSbobina)
                            .then(function(response) {
                                return response.json();
                            })
                            .then(function(sbobinatori) {
                                // Costruisci una stringa contenente i nomi e cognomi degli sbobinatori
                                var sbobinatoriStr = sbobinatori.map(function(sbobinatore) {
                                    return sbobinatore.id_sbobinatore;
                                }).join(", ");

                                // Chiamata a trova_nomi_cognomi per ottenere i nomi e cognomi dei sbobinatori
                                fetch('../req/richiedi_cambio/trova_nomi_cognomi.php?ids=' + sbobinatoriStr)
                                    .then(function(response) {
                                        return response.json();
                                    })
                                    .then(function(nomiCognomi) {
                                        // Costruisci una stringa contenente i nomi e cognomi uno sopra l'altro
                                        var nomiCognomiStr = nomiCognomi.map(function(nc) {
                                            return nc.nome + ' ' + nc.cognome;
                                        }).join("<br>"); // Usa il tag <br> per inserire una nuova riga tra i nomi e cognomi

                                        sbobinatoriCell.innerHTML = nomiCognomiStr; // Mostra i nomi e cognomi uno sopra l'altro
                                    })
                                    .catch(function(error) {
                                        console.error('Errore durante la richiesta per i nomi e cognomi:', error);
                                    });
                            })
                            .catch(function(error) {
                                console.error('Errore durante la richiesta per gli sbobinatori:', error);
                            });

                        // Chiamata a trova_revisori per ottenere i revisori basati sull'id_sbobina
                        fetch('../req/richiedi_cambio/trova_revisori.php?id_sbobina=' + idSbobina)
                            .then(function(response) {
                                return response.json();
                            })
                            .then(function(revisori) {
                                // Costruisci una stringa contenente i nomi e cognomi dei revisori
                                var revisoriStr = revisori.map(function(revisore) {
                                    return revisore.id_revisore;
                                }).join(", ");

                                // Chiamata a trova_nomi_cognomi per ottenere i nomi e cognomi dei revisori
                                fetch('../req/richiedi_cambio/trova_nomi_cognomi.php?ids=' + revisoriStr)
                                    .then(function(response) {
                                        return response.json();
                                    })
                                    .then(function(nomiCognomi) {
                                        // Costruisci una stringa contenente i nomi e cognomi dei revisori uno sopra l'altro
                                        var nomiCognomiStr = nomiCognomi.map(function(nc) {
                                            return nc.nome + ' ' + nc.cognome;
                                        }).join("<br>"); // Usa il tag <br> per inserire una nuova riga tra i nomi e cognomi

                                        revisoriCell.innerHTML = nomiCognomiStr; // Mostra i nomi e cognomi dei revisori uno sopra l'altro
                                    })
                                    .catch(function(error) {
                                        console.error('Errore durante la richiesta per i nomi e cognomi:', error);
                                    });
                            })
                            .catch(function(error) {
                                console.error('Errore durante la richiesta per i revisori:', error);
                            });

                        // Aggiungi un pulsante "richiedi" nella colonna "Azione"
                        azioneCell.innerHTML = '<button class="btn btn-primary" onclick="richiedi()">Richiedi</button>';
                    });
                })
                .catch(function(error) {
                    console.error('Errore durante la richiesta:', error);
                });
            $('#myModal').modal('hide');
        }
    </script>




    </body>
    </html>

    <?php
}else{
    header("Location: ../templates/login.php");
    exit();
}
?>