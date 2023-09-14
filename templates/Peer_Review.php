<?php
session_start();
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

                            <div class="card-body table-responsive p-0">

                                <?php
                                // Esempio di connessione al database
                                include "../db_connector.php";

                                // Verifica la connessione
                                if ($conn->connect_error) {
                                    die("Connessione al database fallita: " . $conn->connect_error);
                                }

                                // Recupera l'ID dell'utente dalla sessione (assicurati che l'utente sia loggato)
                                $userId = $_SESSION['id'];

                                // Query per ottenere le sbobine di cui l'utente è revisore (utilizzo di prepared statement)
                                $sql = "SELECT id_sbobina 
        FROM sx_revisori_sbobine 
        WHERE id_revisore = ? 
        AND id_sbobina IN (SELECT ID FROM sx_sbobine_calendarizzate WHERE caricata = 1)";

                                // Creazione della prepared statement
                                $stmt = $conn->prepare($sql);

                                if ($stmt) {
                                    // Associazione del parametro
                                    $stmt->bind_param('i', $userId);

                                    // Esecuzione della prepared statement
                                    $stmt->execute();

                                    // Ottieni il risultato della query
                                    $result = $stmt->get_result();

                                    // Chiudi la prepared statement
                                    $stmt->close();
                                }
                                ?>


                                <!-- Tabella HTML -->
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
                                    // Esempio di connessione al database
                                    include "../db_connector.php";

                                    // Verifica la connessione
                                    if ($conn->connect_error) {
                                        die("Connessione al database fallita: " . $conn->connect_error);
                                    }

                                    // Recupera l'ID dell'utente dalla sessione (assicurati che l'utente sia loggato)
                                    $userId = $_SESSION['id'];

                                    // Query per ottenere le sbobine di cui l'utente è revisore (utilizzo di prepared statement)
                                    $sql = "SELECT id_sbobina 
        FROM sx_revisori_sbobine 
        WHERE id_revisore = ? 
        AND id_sbobina IN (SELECT ID FROM sx_sbobine_calendarizzate WHERE caricata = 1)";

                                    // Creazione della prepared statement
                                    $stmt = $conn->prepare($sql);

                                    if ($stmt) {
                                        // Associazione del parametro
                                        $stmt->bind_param('i', $userId);

                                        // Esecuzione della prepared statement
                                        $stmt->execute();

                                        // Ottieni il risultato della query
                                        $result = $stmt->get_result();

                                        // Chiudi la prepared statement
                                        $stmt->close();
                                    }

                                    // Mostra le sbobine nella tabella
                                    while ($row = $result->fetch_assoc()) {
                                        $sbobinaId = $row['id_sbobina'];

                                        // Ora puoi eseguire una query per ottenere i dettagli completi della sbobina utilizzando $sbobinaId (utilizzo di prepared statement)
                                        $sbobinaQuery = "SELECT * FROM sx_sbobine_calendarizzate WHERE ID = ?";
                                        $stmtSbobina = $conn->prepare($sbobinaQuery);
                                        $stmtSbobina->bind_param('i', $sbobinaId);
                                        $stmtSbobina->execute();

                                        $sbobinaResult = $stmtSbobina->get_result();

                                        if ($sbobinaResult && $sbobinaResult->num_rows > 0) {
                                            // Stampa i dettagli della sbobina nella riga della tabella
                                            $sbobinaData = $sbobinaResult->fetch_assoc();

                                            // Recupera il nome della materia dalla tabella 'insegnamenti' (utilizzo di prepared statement)
                                            $insegnamentoId = $sbobinaData['insegnamento'];
                                            $insegnamentoQuery = "SELECT materia FROM sx_insegnamenti WHERE id = ?";
                                            $stmtInsegnamento = $conn->prepare($insegnamentoQuery);
                                            $stmtInsegnamento->bind_param('i', $insegnamentoId);
                                            $stmtInsegnamento->execute();

                                            $insegnamentoResult = $stmtInsegnamento->get_result();

                                            $materia = "";
                                            if ($insegnamentoResult && $insegnamentoResult->num_rows > 0) {
                                                $insegnamentoData = $insegnamentoResult->fetch_assoc();
                                                $materia = $insegnamentoData['materia'];
                                            }

                                            // Recupera gli ID degli sbobinatori dalla tabella 'sbobinatori_sbobine' (utilizzo di prepared statement)
                                            $sbobinatoriQuery = "SELECT id_sbobinatore FROM sx_sbobinatori_sbobine WHERE id_sbobina = ?";
                                            $stmtSbobinatori = $conn->prepare($sbobinatoriQuery);
                                            $stmtSbobinatori->bind_param('i', $sbobinaId);
                                            $stmtSbobinatori->execute();

                                            $sbobinatoriResult = $stmtSbobinatori->get_result();
                                            $sbobinatori = [];

                                            if ($sbobinatoriResult && $sbobinatoriResult->num_rows > 0) {
                                                while ($sbobinatoreData = $sbobinatoriResult->fetch_assoc()) {
                                                    $sbobinatori[] = $sbobinatoreData['id_sbobinatore'];
                                                }
                                            }

                                            // Recupera gli ID dei revisori dalla tabella 'revisori_sbobine' (utilizzo di prepared statement)
                                            $revisoriQuery = "SELECT id_revisore FROM sx_revisori_sbobine WHERE id_sbobina = ?";
                                            $stmtRevisori = $conn->prepare($revisoriQuery);
                                            $stmtRevisori->bind_param('i', $sbobinaId);
                                            $stmtRevisori->execute();

                                            $revisoriResult = $stmtRevisori->get_result();
                                            $revisori = [];

                                            if ($revisoriResult && $revisoriResult->num_rows > 0) {
                                                while ($revisoreData = $revisoriResult->fetch_assoc()) {
                                                    $revisori[] = $revisoreData['id_revisore'];
                                                }
                                            }

                                            echo "<tr>";
                                            echo "<td>" . $sbobinaData['id'] . "</td>";
                                            echo "<td>" . $materia . "</td>"; // Mostra il nome della materia
                                            echo "<td>" . $sbobinaData['data_lezione'] . "</td>";

                                            // Mostra il nome e cognome degli sbobinatori uno sotto l'altro, se presenti
                                            echo "<td>";
                                            if (!empty($sbobinatori)) {
                                                foreach ($sbobinatori as $sbobinatoreId) {
                                                    $sbobinatoreQuery = "SELECT nome, cognome FROM sx_users WHERE id = ?";
                                                    $stmtSbobinatore = $conn->prepare($sbobinatoreQuery);
                                                    $stmtSbobinatore->bind_param('i', $sbobinatoreId);
                                                    $stmtSbobinatore->execute();

                                                    $sbobinatoreResult = $stmtSbobinatore->get_result();

                                                    if ($sbobinatoreResult && $sbobinatoreResult->num_rows > 0) {
                                                        $sbobinatoreData = $sbobinatoreResult->fetch_assoc();
                                                        echo $sbobinatoreData['nome'] . " " . $sbobinatoreData['cognome'] . "<br>";
                                                    }
                                                }
                                            }
                                            echo "</td>";

                                            // Mostra il nome e cognome dei revisori uno sotto l'altro, se presenti
                                            echo "<td>";
                                            if (!empty($revisori)) {
                                                foreach ($revisori as $revisoreId) {
                                                    $revisoreQuery = "SELECT nome, cognome FROM sx_users WHERE id = ?";
                                                    $stmtRevisore = $conn->prepare($revisoreQuery);
                                                    $stmtRevisore->bind_param('i', $revisoreId);
                                                    $stmtRevisore->execute();

                                                    $revisoreResult = $stmtRevisore->get_result();

                                                    if ($revisoreResult && $revisoreResult->num_rows > 0) {
                                                        $revisoreData = $revisoreResult->fetch_assoc();
                                                        echo $revisoreData['nome'] . " " . $revisoreData['cognome'] . "<br>";
                                                    }
                                                }
                                            }
                                            echo "</td>";

                                            echo "<td>" . $sbobinaData['argomento'] . "</td>";

                                            echo '<td>';
                                            // Aggiungiamo il link per il download del file
                                            // Effettua il controllo sulla tabella "revisori_sbobine" per vedere se l'utente è autorizzato ad approvare
                                            $currentUserId = $_SESSION['id'];
                                            $queryEsito = "SELECT esito FROM sx_revisori_sbobine WHERE id_revisore = ? AND id_sbobina = ?";
                                            $stmtEsito = $conn->prepare($queryEsito);
                                            $stmtEsito->bind_param('ii', $currentUserId, $sbobinaData['id']);
                                            $stmtEsito->execute();

                                            $resultEsito = $stmtEsito->get_result();
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
                                                echo '<a href="../req/peer_review_fx/gestisci_PR.php?download_sbobina=' . $sbobinaData['id'] . '" class="btn btn-primary">Download</a>';
                                                echo '<a href="#" class="btn btn-success btn-approva" data-sbobina-id="' . $sbobinaData['id'] . '">Approva</a>';
                                            }
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                    }

                                    if ($result->num_rows === 0) {
                                        echo "<tr>";
                                        echo "<td colspan='7'>Non hai sbobine assegnate per la revisione disponibili. <br> 
    Questo può accadere perché non sei un revisore o perché la sbobina 
    non è ancora stata caricata.</td>"; // Colspan 7 per occupare tutte le colonne della tabella
                                        echo "</tr>";
                                    }
                                    ?>

                                    </tbody>

                                </table>

                                <?php
                                // Chiudi la connessione
                                $conn->close();
                                ?>

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

                                            <p>Procedendo, confermi di aver scaricato e letto la sbobina, che essa non presenta gravi errori sintattici e grammaticali, e che il contenuto, per quanto di conoscenza, è facilmente comprensibile.</p>
                                            <!-- Div per il campo di input e l'etichetta -->
                                            <div class="form-group">
                                                <label for="motivazione">Motivazione (OBBLIGATORIA in caso di rigetto)</label>
                                                <textarea class="form-control" id="motivazione" rows="3" placeholder="Inserisci il motivo del rigetto"></textarea>
                                                <div id="char-count" class="text-muted">255 caratteri rimanenti</div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger btn-rigetta" data-sbobina-id="<?php echo $sbobinaData['id']; ?>" data-dismiss="modal">Rigetta</button>
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
<script>
    $(document).ready(function() {
        $('.btn-rigetta').click(function() {
            var sbobinaId = $(this).data('sbobina-id');
            var motivazione = $('#motivazione').val();
            var revisoreId = <?php echo $_SESSION['id']; ?>;

            // Effettua la richiesta AJAX per cancellare la sbobina
            $.ajax({
                url: '../req/peer_review_fx/rigetta_sbobina.php',
                type: 'POST',
                data: { id_sbobina: sbobinaId, motivazione: motivazione, id_revisore: revisoreId},
                success: function(response) {
                    // Ricevi la risposta dal server e gestisci le azioni da intraprendere
                    if (response === 'success') {
                        // Mostra un messaggio di successo
                        alert('Sbobina rigettata con successo! Contatta lo sbobinatore per invitarlo ad un nuovo invio.');
                    } else {
                        // Gestisci eventuali errori
                        alert('Sbobina rigettata con successo! Contatta lo sbobinatore per invitarlo ad un nuovo invio.');
                    }
                },
                error: function() {
                    // Gestisci eventuali errori di connessione o del server
                    alert('Errore di connessione al server.');
                }
            });
        });
    });
</script>
<script>
    // Funzione per aggiornare il contatore dei caratteri
    function updateCharCount() {
        var maxLength = 255; // Lunghezza massima consentita
        var currentLength = $('#motivazione').val().length;
        var remainingLength = maxLength - currentLength;

        if (remainingLength >= 0) {
            $('#char-count').text(remainingLength + ' caratteri rimanenti').removeClass('text-danger');
        } else {
            $('#char-count').text('Limite di caratteri superato').addClass('text-danger');
        }
    }

    // Aggiorna il contatore dei caratteri quando il campo di testo cambia
    $('#motivazione').on('input', updateCharCount);

    // Inizializza il contatore al caricamento della pagina
    $(document).ready(function() {
        updateCharCount();
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