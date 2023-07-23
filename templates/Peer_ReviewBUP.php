<?php
session_start();
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
                        <h1 class="m-0">Peer Reviewing System</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">

                    </div><!-- /.col -->
                </div><!-- /.row -->
                <!-- block content -->



                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Sbobine Assegnate da Revisionare</h3>


                            </div>
                            <!-- /.card-header -->
                            <?php
                            // Connessione al database (sostituisci con le tue credenziali)
                            include "../db_connector.php";

                            // Verifica la connessione
                            if ($conn->connect_error) {
                                die("Connessione fallita: " . $conn->connect_error);
                            }

                            // Ottenere l'ID dell'utente corrente (supponiamo che tu abbia già questa informazione)
                            $current_user_id = 1; // Sostituisci con l'ID dell'utente corrente

                            // Query per ottenere gli ID delle sbobine assegnate all'utente corrente
                            $sql = "SELECT id_sbobina FROM revisori_sbobine WHERE id_revisore = $current_user_id";
                            $result = $conn->query($sql);

                            // Array per memorizzare gli ID delle sbobine
                            $sbobine_ids = array();

                            if ($result->num_rows > 0) {
                                // Memorizza gli ID delle sbobine nell'array
                                while ($row = $result->fetch_assoc()) {
                                    $sbobine_ids[] = $row['id_sbobina'];
                                }
                            }

                            ?>

                            <!-- Ora popoliamo la tabella HTML con gli ID delle sbobine assegnate all'utente corrente -->
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
                                    // Otteniamo l'id dell'utente loggato
                                    $current_user_id = $_SESSION['id']; // Sostituisci con il vero id dell'utente loggato

                                    // Iteriamo attraverso gli ID delle sbobine e popoliamo la tabella
                                    foreach ($sbobine_ids as $sbobina_id) {
                                        // Esegui un'altra query per ottenere i dettagli della sbobina usando $sbobina_id
                                        $sql_sbobina = "SELECT sc.*, i.materia, 
        GROUP_CONCAT(DISTINCT us.nome, ' ', us.cognome SEPARATOR '<br>') AS sbobinatori,
        GROUP_CONCAT(DISTINCT ur.nome, ' ', ur.cognome SEPARATOR '<br>') AS revisori
        FROM sbobine_calendarizzate sc
        INNER JOIN insegnamenti i ON sc.id = i.id
        LEFT JOIN sbobinatori_sbobine ss ON sc.id = ss.id_sbobina
        LEFT JOIN users us ON ss.id_sbobinatore = us.id
        LEFT JOIN revisori_sbobine rs ON sc.id = rs.id_sbobina
        LEFT JOIN users ur ON rs.id_revisore = ur.id
        WHERE sc.id = $sbobina_id
        AND (ss.id_sbobinatore = $current_user_id OR rs.id_revisore = $current_user_id)
        GROUP BY sc.id";

                                        $result_sbobina = $conn->query($sql_sbobina);

                                        if ($result_sbobina->num_rows > 0) {
                                            $row_sbobina = $result_sbobina->fetch_assoc();
                                            echo '<tr>';
                                            echo '<td>' . $row_sbobina['id'] . '</td>';
                                            echo '<td>' . $row_sbobina['materia'] . '</td>';
                                            echo '<td>' . $row_sbobina['data_lezione'] . '</td>';

                                            // Controlla se ci sono sbobinatori disponibili
                                            if ($row_sbobina['sbobinatori']) {
                                                echo '<td>' . $row_sbobina['sbobinatori'] . '</td>';
                                            } else {
                                                echo '<td>Nessun Sbobinatore Assegnato</td>';
                                            }

                                            // Controlla se ci sono revisori disponibili
                                            if ($row_sbobina['revisori']) {
                                                echo '<td>' . $row_sbobina['revisori'] . '</td>';
                                            } else {
                                                echo '<td>Nessun Revisore Assegnato</td>';
                                            }

                                            echo '<td>' . $row_sbobina['argomento'] . '</td>';
                                            echo '<td>';
                                            // Aggiungiamo il link per il download del file
                                            // Effettua il controllo sulla tabella "revisori_sbobine" per vedere se l'utente è autorizzato ad approvare
                                            $currentUserId = $_SESSION['id'];
                                            $queryEsito = "SELECT esito FROM revisori_sbobine WHERE id_revisore = $currentUserId AND id_sbobina = " . $row_sbobina['id'];
                                            $resultEsito = $conn->query($queryEsito);
                                            $approvato = false;

                                            if ($resultEsito && $resultEsito->num_rows > 0) {
                                                $rowEsito = $resultEsito->fetch_assoc();
                                                if ($rowEsito['esito'] == 1) {
                                                    $approvato = true;
                                                }
                                            }

                                            // Stampa i bottoni "Download" e "Approva" e disabilitali se l'utente ha già effettuato il download o l'approvazione
                                            if ($approvato) {
                                                echo '<button class="btn btn-primary" disabled>Download</button>';
                                                echo '<button class="btn btn-success btn-approva" disabled>Approva</button>';
                                            } else {
                                                echo '<a href="../req/peer_review_fx/gestisci_PR.php?download_sbobina=' . $row_sbobina['id'] . '" class="btn btn-primary">Download</a>';
                                                echo '<a href="#" class="btn btn-success btn-approva" data-sbobina-id="' . $row_sbobina['id'] . '">Approva</a>';
                                            }                                          echo '</td>';
                                            echo '</tr>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                    }
                                    ?>

                                    </tbody>
                                </table>
                            </div>

                            <div id="avvisoMaschera" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 20px; background-color: #f0f0f0; border: 1px solid #ccc; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); z-index: 9999;">
                                <p id="avvisoMessaggio"></p>
                            </div>

                            <!-- La finestra modale di conferma -->
                            <div class="modal fade" id="confermaModal" tabindex="-1" aria-labelledby="confermaModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confermaModalLabel">Conferma approvazione</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <label>Sei sicuro di voler approvare questa sbobina?</label>
                                        </div>
                                        <div class="modal-body">
                                            Procedendo, confermi di aver scaricato e letto la sbobina, che essa
                                            non presenta gravi errori sintattici e grammaticali, e che il contenuto
                                            per quanto di conoscenza, è facilmente comprensibile.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Rigetta</button>
                                            <button type="button" class="btn btn-success" id="btn-conferma-modal">Conferma</button>
                                        </div>
                                    </div>
                                </div>
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
        <strong>Copyright &copy; 2023 <a href="https://github.com/devdeleli">DEVDELELI</a>.</strong> All rights reserved.
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
<!-- Nel tuo file HTML, nella sezione head, assicurati di avere inclusi i file di jQuery e Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        // Quando si clicca sul pulsante "Approva"
        $('.btn-approva').on('click', function(e) {
            e.preventDefault();
            var sbobinaId = $(this).data('sbobina-id');
            var approvaUrl = "../req/peer_review_fx/gestisci_PR.php?approva_sbobina=" + sbobinaId;

            // Mostriamo la finestra modale di conferma
            $('#confermaModal').modal('show');

            // Se viene cliccato il pulsante "Conferma" nella finestra modale
            $('#btn-conferma-modal').on('click', function() {
                // Effettua la richiesta Ajax per chiamare la funzione approve_sbobina_in_database
                $.ajax({
                    url: approvaUrl,
                    method: 'GET',
                    dataType: 'json', // Specifica il tipo di dati da attendersi nella risposta
                    success: function(response) {
                        // Qui puoi gestire la risposta ricevuta dal server
                        if (response.success) {
                            // Mostra avviso di successo nella maschera
                            showAvviso(response.message, 'success');
                        } else {
                            // Mostra avviso di errore nella maschera
                            showAvviso(response.message, 'error');
                        }

                        // Chiudiamo la finestra modale dopo aver effettuato la richiesta
                        $('#confermaModal').modal('hide');
                    },
                    error: function(xhr, status, error) {
                        // Gestione degli errori, se necessario
                        console.error(error);
                    }
                });
            });

// Funzione per mostrare l'avviso nella maschera
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