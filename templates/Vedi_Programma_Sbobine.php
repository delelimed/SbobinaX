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
                            <h1 class="m-0">Vedi le Sbobine in Programma</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <!-- block content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Gestisci le Sbobine in Programma</h3>

                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <form id="formRicerca" method="post" action="../req/ricerca_sbobine.php" class="input-group input-group-sm" style="width: 150px;">
                                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-default">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <?php
                                $query = "SELECT * FROM `sbobine_calendarizzate`";
                                $result = $conn->query($query);
                                $risultati = $result->fetch_all(MYSQLI_ASSOC);
                                // $conn->close();
                                ?>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Insegnamento</th>
                                            <th>Data Lezione</th>
                                            <th>Sbobinatori</th>
                                            <th>Revisori</th>
                                            <th>Azioni</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        // Funzione per ottenere il nome della materia dall'id insegnamento
                                        function getMateriaFromId($idInsegnamento) {
                                            include '../db_connector.php';
                                            // Esegui la query per ottenere il nome della materia
                                            $query = "SELECT materia FROM insegnamenti WHERE id = ?";
                                            $stmt = $conn->prepare($query);
                                            $stmt->bind_param('i', $idInsegnamento);
                                            $stmt->execute();
                                            $stmt->bind_result($materia);

                                            // Estrai il risultato della query
                                            if ($stmt->fetch()) {
                                                return $materia;
                                            } else {
                                                return 'Materia non trovata';
                                            }
                                        }
                                        ?>
                                        <?php
                                        function getSbobinatoriFromSbobina($sbobina_id, $conn)
                                        {
                                            $sbobinatori_data = array();

                                            // Esegui la query per ottenere gli ID degli sbobinatori associati alla sbobina
                                            $query = "SELECT id_sbobinatore FROM sbobinatori_sbobine WHERE id_sbobina = $sbobina_id";
                                            $result = $conn->query($query);

                                            // Popola l'array con gli ID degli sbobinatori
                                            while ($row = $result->fetch_assoc()) {
                                                $sbobinatori_ids[] = $row['id_sbobinatore'];
                                            }

                                            // Ottieni i nomi e i cognomi degli sbobinatori associati agli ID
                                            if (!empty($sbobinatori_ids)) {
                                                $sbobinatori_ids_str = implode(',', $sbobinatori_ids);
                                                $query_users = "SELECT nome, cognome FROM users WHERE id IN ($sbobinatori_ids_str)";
                                                $result_users = $conn->query($query_users);

                                                // Popola l'array con i nomi completi degli sbobinatori
                                                while ($row_user = $result_users->fetch_assoc()) {
                                                    $sbobinatori_data[] = $row_user['nome'] . ' ' . substr($row_user['cognome'], 0, 1) . '.';
                                                }
                                            }

                                            return $sbobinatori_data;
                                        }

                                        ?>
                                        <?php
                                        function getRevisoriFromSbobina($sbobina_id, $conn)
                                        {
                                            $revisori_data = array();

                                            // Esegui la query per ottenere gli ID degli revisori associati alla sbobina
                                            $query = "SELECT id_revisore FROM revisori_sbobine WHERE id_sbobina = $sbobina_id";
                                            $result = $conn->query($query);

                                            // Popola l'array con gli ID degli sbobinatori
                                            while ($row = $result->fetch_assoc()) {
                                                $revisori_ids[] = $row['id_revisore'];
                                            }

                                            // Ottieni i nomi e i cognomi dei revisori associati agli ID
                                            if (!empty($revisori_ids)) {
                                                $revisori_ids_str = implode(',', $revisori_ids);
                                                $query_users = "SELECT nome, cognome FROM users WHERE id IN ($revisori_ids_str)";
                                                $result_users = $conn->query($query_users);

                                                // Popola l'array con i nomi completi dei revisori
                                                while ($row_user = $result_users->fetch_assoc()) {
                                                    $revisori_data[] = $row_user['nome'] . ' ' . substr($row_user['cognome'], 0, 1) . '.';
                                                }
                                            }

                                            return $revisori_data;
                                        }

                                        ?>

                                        <?php foreach ($risultati as $row): ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo getMateriaFromId($row['insegnamento']); ?></td>
                                                <td><?php echo $row['data_lezione']; ?></td>
                                                <td>
                                                    <?php
                                                    // Ottieni i nomi completi ma solo l'iniziale del cognome degli sbobinatori associati a questa sbobina
                                                    $sbobinatori_data = getSbobinatoriFromSbobina($row['id'], $conn);
                                                    // Visualizza i nomi completi ma solo l'iniziale del cognome separati da una virgola
                                                    echo implode(", ", $sbobinatori_data);
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    // Ottieni i nomi completi ma solo l'iniziale del cognome degli sbobinatori associati a questa sbobina
                                                    $revisori_data = getRevisoriFromSbobina($row['id'], $conn);
                                                    // Visualizza i nomi completi ma solo l'iniziale del cognome separati da una virgola
                                                    echo implode(", ", $revisori_data);
                                                    ?>
                                                </td>
                                                <td>
                                                    <!-- Pulsante Modifica -->
                                                    <button class="btn btn-primary btn-sm btn-modifica"
                                                            data-id="<?php echo $row['id']; ?>"
                                                            data-insegnamento="<?php echo $row['insegnamento']; ?>"
                                                            data-data-lezione="<?php echo $row['data_lezione']; ?>">Modifica</button>

                                                    <!-- Pulsante Elimina nella riga -->
                                                    <button class="btn btn-danger btn-sm btn-elimina" data-id="<?php echo $row['id']; ?>">Elimina</button>
                                                </td>
                                            </tr>
                                            <!-- Finestra modale per la modifica -->
                                            <div class="modal fade" id="modificaModal" tabindex="-1" role="dialog" aria-labelledby="modificaModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modificaModalLabel">Modifica Sbobina</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="formModificaSbobina">
                                                                <input type="hidden" id="idSbobinaModifica" name="idSbobina"> <!-- Assicurati che il nome sia corretto -->

                                                                <div class="form-group">
                                                                    <label for="insegnamentoModifica">Insegnamento</label>
                                                                    <select class="form-control" id="insegnamentoModifica" name="insegnamentoModifica">
                                                                        <option value="">Seleziona l'insegnamento</option>
                                                                        <?php
                                                                        // Esegui la query per ottenere gli insegnamenti dal database
                                                                        $query = "SELECT id, materia FROM insegnamenti";
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
                                                                <div class="form-group">
                                                                    <label for="dataLezioneModifica">Data Lezione</label>
                                                                    <input type="date" class="form-control" id="dataLezioneModifica" name="dataLezioneModifica">
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                                                            <button type="button" class="btn btn-primary" name="btnSalvaModifiche" id="btnSalvaModifiche">Salva modifiche</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Finestra modale per l'eliminazione -->
                                            <div class="modal fade" id="eliminaModal" tabindex="-1" role="dialog" aria-labelledby="eliminaModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="eliminaModalLabel">Elimina Sbobina</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Sei sicuro di voler eliminare questa sbobina?</p>
                                                            <!-- Aggiungi eventuali dettagli aggiuntivi sulla sbobina da eliminare -->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                                                            <button type="button" class="btn btn-danger" id="btnConfermaElimina">Elimina</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php endforeach; ?>

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
    <!-- Includi jQuery e Bootstrap prima del codice JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script>

        document.querySelectorAll('.btn-modifica').forEach(function (btn) {
            btn.addEventListener('click', function () {
                // Ottieni i dati della riga dalla riga associata al pulsante
                var idSbobina = this.getAttribute('data-id');
                var idInsegnamento = this.getAttribute('data-insegnamento');
                var dataLezione = this.getAttribute('data-data-lezione');

                // Popola il form di modifica con i dati ottenuti dalla riga
                document.getElementById('idSbobinaModifica').value = idSbobina;
                document.getElementById('insegnamentoModifica').value = idInsegnamento;
                document.getElementById('dataLezioneModifica').value = dataLezione;

                // Apri la finestra modale per la modifica
                $('#modificaModal').modal('show');
            });
        });

        document.querySelectorAll('.btn-elimina').forEach(function (btn) {
            btn.addEventListener('click', function () {
                // Ottieni l'ID sbobina dalla riga associata al pulsante
                var idSbobina = this.getAttribute('data-id');

                // Qui puoi inserire il codice per caricare i dati della sbobina corrispondente nella finestra modale per l'eliminazione
                // Ad esempio, puoi utilizzare una chiamata AJAX per ottenere i dati dalla tua API

                // Apri la finestra modale per l'eliminazione
                $('#eliminaModal').modal('show');

                // Aggiungi un gestore di eventi per il pulsante "Elimina" all'interno della finestra modale
                document.getElementById('btnConfermaElimina').addEventListener('click', function () {
                    // Qui puoi inserire il codice per gestire l'eliminazione della sbobina
                    // Ad esempio, puoi utilizzare una chiamata AJAX per inviare l'ID della sbobina da eliminare al tuo script PHP

                    // Chiudi la finestra modale dopo aver confermato l'eliminazione
                    $('#eliminaModal').modal('hide');

                    // Puoi anche aggiornare la tabella delle sbobine per riflettere la rimozione della sbobina
                    // Esempio: location.reload();
                });
            });
        });

    </script>
    <!-- Codice JavaScript per gestire i bottoni nella finestra modale per la modifica -->
    <script>
        // Codice JavaScript per gestire il click sul pulsante "Salva modifiche" nella finestra modale per la modifica
        document.getElementById('btnSalvaModifiche').addEventListener('click', function () {
            // Ottieni i dati modificati dal form
            var idSbobina = document.getElementById('idSbobinaModifica').value;
            var idInsegnamento = document.getElementById('insegnamentoModifica').value; // Cambia nome da 'nomeInsegnamento' a 'idInsegnamento'
            var dataLezione = document.getElementById('dataLezioneModifica').value;

            // Nuovo codice per ottenere il nome dell'insegnamento dall'ID
            var nomeInsegnamento = document.getElementById('insegnamentoModifica').options[document.getElementById('insegnamentoModifica').selectedIndex].text;

            fetch('../req/modifica_programma_sbobina.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'idSbobina=' + encodeURIComponent(idSbobina) + '&nomeInsegnamento=' + encodeURIComponent(nomeInsegnamento) + '&dataLezione=' + encodeURIComponent(dataLezione),
            })
                .then(response => response.text())
                .then(data => {
                    // Visualizza eventuali messaggi di conferma o errore
                    alert(data);
                    // Chiudi la finestra modale dopo aver salvato le modifiche
                    $('#modificaModal').modal('hide');
                    // Aggiorna la pagina per riflettere le modifiche
                    location.reload();
                })
                .catch(error => {
                    console.error('Errore durante la richiesta di salvataggio delle modifiche:', error);
                    alert('Si è verificato un errore durante il salvataggio delle modifiche.');
                });
        });


        // Gestione del click sul pulsante "Annulla" nella finestra modale per la modifica
        document.querySelector('#modificaModal .btn-secondary').addEventListener('click', function () {
            // Chiudi la finestra modale senza salvare le modifiche
            $('#modificaModal').modal('hide');
        });
    </script>
    <script>
        // Gestione del click sul pulsante "Elimina" all'interno della finestra modale per l'eliminazione
        document.querySelectorAll('.btn-elimina').forEach(function (btn) {
            btn.addEventListener('click', function () {
                // Ottieni l'ID sbobina dalla riga associata al pulsante "Elimina"
                var idSbobina = this.getAttribute('data-id');

                // Esegui la chiamata AJAX per eliminare la sbobina
                fetch('../req/elimina_programma_sbobina.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'idSbobina=' + encodeURIComponent(idSbobina),
                })
                    .then(response => response.text())
                    .then(data => {
                        // Visualizza eventuali messaggi di conferma o errore
                        alert(data);
                        // Chiudi la finestra modale dopo aver eliminato la sbobina
                        $('#eliminaModal').modal('hide');
                        // Aggiorna la pagina per riflettere la rimozione della sbobina
                        location.reload();
                    })
                    .catch(error => {
                        console.error('Errore durante la richiesta di eliminazione della sbobina:', error);
                        alert('Si è verificato un errore durante l\'eliminazione della sbobina.');
                    });
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