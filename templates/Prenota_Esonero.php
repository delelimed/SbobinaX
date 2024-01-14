<meta name="robots" content="noindex">
<?php
session_start();
include '../db_connector.php';
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
                        <a href="#" class="d-block"> <strong> Sistema di Prenotazione </strong> </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        <?php
                        $active_menu = 'Home';
                        $page_name = 'Prenota_Esonero.php';
                        ?>
                        <li class="nav-item">
                            <a href="../templates/Prenota_Esonero.php" class="nav-link">
                                <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'Home') : ?>
                                    <i class="nav-icon fas fa-calculator" aria-hidden="true"></i>
                                    <p>
                                        Prenota Esonero
                                    </p>
                                    <span class="badge bg-success">Active</span>
                                <?php else : ?>
                                    <i class="nav-icon fas fa-calculator" aria-hidden="true"></i>
                                    <p>
                                        Prenota Esonero
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
                                    $currentDate = date("Y-m-d");

                                    // Query per ottenere i dati dalla tabella
                                    $sql = "SELECT id, insegnamento, docente, data_esonero, data_scadiscrizioni FROM sx_esamidisponibili WHERE data_scadiscrizioni >= '$currentDate'";
                                    $result = $conn->query($sql);

                                    // Genera la tabella HTML
                                    echo '<table class="table table-hover text-nowrap">
        <thead>
            <tr>
                <th>ID</th>
                <th>Insegnamento</th>
                <th>Docente</th>
                <th>Data Esonero</th>
                <th>Data Fine Prenotazione</th>
                <th>Prenota</th>
            </tr>
        </thead>
        <tbody>';

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<tr>';
                                            echo '<td>' . $row['id'] . '</td>';
                                            echo '<td>' . $row['insegnamento'] . '</td>';
                                            echo '<td>' . $row['docente'] . '</td>';
                                            echo '<td>' . date("d-m-Y", strtotime($row['data_esonero'])) . '</td>';
                                            echo '<td>' . date("d-m-Y", strtotime($row['data_scadiscrizioni'])) . '</td>';
                                            echo '<td><button class="btn btn-success prenota-button" data-id-esame="' . $row['id'] . '">Prenota</button></td>';
                                            echo '</tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="6">Nessun risultato trovato</td></tr>';
                                    }

                                    echo '</tbody></table>';

                                    // Chiudi la connessione al database
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


                    <div class="modal fade" id="prenotaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Prenotazione Esonero</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form per la prenotazione -->
                                    <form id="prenotazioneForm">
                                        <div class="form-group">
                                            <label for="nome">Nome</label>
                                            <input type="text" class="form-control" id="nome" name="nome" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="cognome">Cognome</label>
                                            <input type="text" class="form-control" id="cognome" name="cognome" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="matricola">Matricola</label>
                                            <input type="text" class="form-control" id="matricola" name="matricola" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                    <button type="button" class="btn btn-primary" id="confermaPrenotazione">Conferma Prenotazione</button>
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
                Sistema SbobinaX v2.2 HT-res
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
        $(document).ready(function () {
            // Gestisce il clic sul pulsante "Prenota"
            $('.prenota-button').on('click', function () {
                // Recupera l'ID dell'esame dalla riga
                var idEsame = $(this).data('id-esame');

                // Assegna l'ID dell'esame alla modale
                $('#prenotaModal').data('id-esame', idEsame);

                // Aggiorna il nome dell'insegnamento nell'intestazione della modale
                $.ajax({
                    url: '../req/gestione_esoneri/get_insegnamento.php', // Sostituisci con il percorso del tuo script PHP per ottenere l'insegnamento e la data
                    method: 'POST',
                    data: { idEsame: idEsame },
                    success: function (result) {
                        var dataEsonero = result.dataEsonero;
                        var insegnamento = result.insegnamento;
                        $('#exampleModalLabel').text('Prenotazione Esonero per ' + insegnamento + ' del ' + dataEsonero);
                    },
                    error: function () {
                        alert('Errore durante il recupero del nome dell\'insegnamento e della data.');
                    }
                });

                // Apri la modale
                $('#prenotaModal').modal('show');
            });

            // Gestisce il clic sul pulsante "Conferma Prenotazione" nella modale
            $('#confermaPrenotazione').on('click', function () {
                // Recupera l'ID dell'esame dalla modale
                var idEsame = $('#prenotaModal').data('id-esame');

                // Raccogli i dati dal modulo
                var nome = $('#nome').val();
                var cognome = $('#cognome').val();
                var matricola = $('#matricola').val();
                var email = $('#email').val();

                // Esegui una richiesta AJAX per inviare i dati al tuo script di backend
                $.ajax({
                    url: '../req/gestione_esoneri/non_registrato.php', // Sostituisci con il percorso del tuo script di backend
                    method: 'POST',
                    data: {
                        nome: nome,
                        cognome: cognome,
                        matricola: matricola,
                        email: email,
                        idEsame: idEsame // Utilizza l'ID dell'esame recuperato
                    },
                    success: function (response) {
                        // Chiudi la modale
                        $('#prenotaModal').modal('hide');
                        // Aggiorna la pagina o effettua altre azioni
                        window.location.reload();
                    },
                    error: function () {
                        // Gestisci eventuali errori
                        alert('Errore durante la prenotazione dell\'esame.');
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

    </body>
    </html>
