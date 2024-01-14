<meta name="robots" content="noindex">
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
        <title>SbobinaX | Prenota Sbobina</title>

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
                            <h1 class="m-0">Prenota una Sbobina</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">

                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Sbobine Prenotabili</h3>

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
                                <?php
                                // Connessione al database (sostituisci con le tue credenziali)
                                include '../db_connector.php';

                                $conn = mysqli_connect($sName, $uName, $pass, $db_name);
                                if ($conn->connect_error) {
                                    die("Connessione al database fallita: " . $conn->connect_error);
                                }

                                // Query per ottenere i dati dalla tabella sx_sbobine_calendarizzate
                                $sql = "SELECT id, insegnamento, num_sbobinatori, DATE_FORMAT(data_lezione, '%d-%m-%Y') as data_formattata, num_revisori 
FROM sx_sbobine_calendarizzate
WHERE insegnamento IN (SELECT id_insegnamento FROM sx_partecipazione_sbobine WHERE id_user = ?) ORDER BY data_lezione";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param('i', $_SESSION['id']);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                if ($result->num_rows > 0) {
                                    // Inizio della tabella HTML
                                    echo '<div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Insegnamento</th>
                    <th>Data Lezione</th>
                    <th>Sbobinatori Mancanti</th>
                    <th>Revisori Mancanti</th>
                    <th>Prenota come...</th>
                </tr>
            </thead>
            <tbody>';

                                    while ($row = $result->fetch_assoc()) {
                                        $sbobinaId = $row['id'];
                                        $revisoreId = $row['id'];

                                        $insegnamento = $row['insegnamento'];
                                        $sql_materia = "SELECT materia FROM sx_insegnamenti WHERE id = ?";
                                        $stmt_materia = $conn->prepare($sql_materia);
                                        $stmt_materia->bind_param('i', $insegnamento);
                                        $stmt_materia->execute();
                                        $result_materia = $stmt_materia->get_result();
                                        $row_materia = $result_materia->fetch_assoc();
                                        $materia = $row_materia['materia'];

                                        // Query per contare il numero di inserimenti corrispondenti nelle tabelle sx_revisori_sbobine e s_sbobinatori_sbobine
                                        $sbobina_id = $row['id'];
                                        $sql_revisori = "SELECT COUNT(*) as num_revisori FROM sx_revisori_sbobine WHERE id_sbobina = ?";
                                        $stmt_revisori = $conn->prepare($sql_revisori);
                                        $stmt_revisori->bind_param('i', $sbobina_id);
                                        $stmt_revisori->execute();
                                        $result_revisori = $stmt_revisori->get_result();

                                        $sql_sbobinatori = "SELECT COUNT(*) as num_sbobinatori FROM sx_sbobinatori_sbobine WHERE id_sbobina = ?";
                                        $stmt_sbobinatori = $conn->prepare($sql_sbobinatori);
                                        $stmt_sbobinatori->bind_param('i', $sbobina_id);
                                        $stmt_sbobinatori->execute();
                                        $result_sbobinatori = $stmt_sbobinatori->get_result();

                                        $row_revisori = $result_revisori->fetch_assoc();
                                        $row_sbobinatori = $result_sbobinatori->fetch_assoc();

                                        $num_revisori = $row_revisori['num_revisori'];
                                        $num_sbobinatori = $row_sbobinatori['num_sbobinatori'];

                                        // Calcolare il numero di revisori e sbobinatori mancanti
                                        $revisori_mancanti = $row['num_revisori'] - $num_revisori;
                                        $sbobinatori_mancanti = $row['num_sbobinatori'] - $num_sbobinatori;

                                        // Se il numero di inserimenti è inferiore al numero di sbobinatori o revisori, mostra la riga
                                        if ($revisori_mancanti > 0 || $sbobinatori_mancanti > 0) {
                                            // Verifica se l'utente è già uno sbobinatore per questa lezione
                                            $query_verifica_sbobinatore = "SELECT COUNT(*) as num_sbobinatore FROM sx_sbobinatori_sbobine WHERE id_sbobina = ? AND id_sbobinatore = ?";
                                            $stmt_verifica_sbobinatore = $conn->prepare($query_verifica_sbobinatore);
                                            $stmt_verifica_sbobinatore->bind_param('ii', $sbobinaId, $_SESSION['id']);
                                            $stmt_verifica_sbobinatore->execute();
                                            $result_verifica_sbobinatore = $stmt_verifica_sbobinatore->get_result();
                                            $row_verifica_sbobinatore = $result_verifica_sbobinatore->fetch_assoc();
                                            $num_sbobinatore = $row_verifica_sbobinatore['num_sbobinatore'];

                                            // Verifica se l'utente è già un revisore per questa lezione
                                            $query_verifica_revisore = "SELECT COUNT(*) as num_revisore FROM sx_revisori_sbobine WHERE id_sbobina = ? AND id_revisore = ?";
                                            $stmt_verifica_revisore = $conn->prepare($query_verifica_revisore);
                                            $stmt_verifica_revisore->bind_param('ii', $revisoreId, $_SESSION['id']);
                                            $stmt_verifica_revisore->execute();
                                            $result_verifica_revisore = $stmt_verifica_revisore->get_result();
                                            $row_verifica_revisore = $result_verifica_revisore->fetch_assoc();
                                            $num_revisore = $row_verifica_revisore['num_revisore'];

                                            // Disabilita il pulsante "sbobinatore" se l'utente è già uno sbobinatore per questa lezione
                                            $sbobinatore_disabled = ($num_sbobinatore > 0 || $num_revisore > 0) ? 'disabled' : '';
                                            $revisori_disabled = ($num_sbobinatore > 0 || $num_revisore > 0) ? 'disabled' : '';

                                            echo '<tr>
                    <td>' . $row['id'] . '</td>
                    <td>' . $materia . '</td>
                    <td>' . $row['data_formattata'] . '</td>

                    <td>' . $sbobinatori_mancanti . '</td>
                    <td>' . $revisori_mancanti . '</td>
                    <td>
                        <button class="btn btn-primary sbobinatore-btn" data-id="' . $row['id'] . '" ' . ($sbobinatori_mancanti <= 0 ? 'disabled' : '') . ' ' . $sbobinatore_disabled . '>Sbobinatore</button>
                        <button class="btn btn-success revisore-btn" data-id="' . $row['id'] . '" ' . ($revisori_mancanti <= 0 ? 'disabled' : '') . ' ' . $revisori_disabled . '>Revisore</button>
                    </td>
                </tr>';
                                        }
                                    }
                                    // Chiusura della tabella HTML
                                    echo '</tbody>
        </table>
    </div>';
                                } else {
                                    echo "Nessun risultato trovato.";
                                }

                                // Chiudi la connessione al database
                                $stmt->close();
                                $conn->close();
                                ?>

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
    <!-- Includi la libreria jQuery (assicurati di averla inclusa nel tuo progetto) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.revisore-btn').click(function () {
                var sbobinaId = $(this).data('id');
                var conferma = confirm("Sei sicuro di voler diventare un revisore per questa lezione? " +
                    "Ricordati che non potrai più cambiare la tua scelta, e che devi seguire le indicazioni" +
                    "fornite dal responsabile delle sbobine per quanto riguarda il numero di sbobine da fare e" +
                    "la tipologia di prenotazione (sbobinatore / revisore). Sei sicuro di voler procedere?");

                if (conferma) {
                    // Invia una richiesta AJAX per salvare i dati nel database
                    $.ajax({
                        url: '../req/prenota/salva_revisore.php', // Sostituisci con il percorso del tuo script PHP per salvare i dati
                        type: 'POST',
                        data: { sbobinaId: sbobinaId },
                        success: function (response) {
                            alert(response); // Mostra un messaggio di conferma
                            location.reload();
                        },
                        error: function () {
                            alert("Si è verificato un errore durante il salvataggio dei dati.");
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.sbobinatore-btn').click(function () {
                var sbobinaId = $(this).data('id');
                var conferma = confirm("Sei sicuro di voler diventare uno sbobinatore per questa lezione? " +
                    "Ricordati che non potrai più cambiare la tua scelta, e che devi seguire le indicazioni" +
                    "fornite dal responsabile delle sbobine per quanto riguarda il numero di sbobine da fare e" +
                    "la tipologia di prenotazione (sbobinatore / revisore). Sei sicuro di voler procedere?");

                if (conferma) {
                    // Invia una richiesta AJAX per salvare i dati nel database
                    $.ajax({
                        url: '../req/prenota/salva_sbobinatore.php', // Sostituisci con il percorso del tuo script PHP per salvare i dati
                        type: 'POST',
                        data: { sbobinaId: sbobinaId },
                        success: function (response) {
                            alert(response); // Mostra un messaggio di conferma
                            location.reload();
                        },
                        error: function () {
                            alert("Si è verificato un errore durante il salvataggio dei dati.");
                        }
                    });
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