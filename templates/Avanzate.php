<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['nome']) && $_SESSION['admin'] == 1){

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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
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
                            <h1 class="m-0">IMPOSTAZIONI AVANZATE</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <!-- block content -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Preparazione per Cambio Semestre</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="card-body">
                                <td>
                                    <button type="button" id="btn-download-zip" class="btn btn-block btn-primary" data-action="download_zip">1. Scarica TUTTE le sbobine in formato .zip</button>
                                </td>
                                <td>
                                    <button type="button" id="btn-download-all" class="btn btn-block btn-primary" data-action="download_zip">1. Scarica TUTTE le sbobine in formato singolarmente (se pulsante sopra non funziona)</button>
                                </td>
                                <td>
                                    <button type="button" id="btn-elimina-sbob" class="btn btn-block btn-danger" data-action="elimina_sbobine">2. ELIMINA TUTTE LE SBOBINE</button>
                                </td>
                                <td>
                                    <button type="button" id="btn-elimina-recsbo" class="btn btn-block btn-danger" data-action="elimina_record_sbobine">3. Elimina il record delle sbobine</button>
                                </td>
                                <td>
                                    <button type="button" id="btn-elimina-ins" class="btn btn-block btn-danger" data-action="elimina_insegnamenti">4. Elimina gli insegnamenti attuali</button>
                                </td>
                                <td>
                                    <button type="button" id="btn-elimina-usr" class="btn btn-block btn-danger" data-action="elimina_utenti">5. Eventuale: elimina utenti (SuperUser non vengono eliminati)</button>
                                </td>
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


    <script>

        $(document).ready(function() {
            // Aggiungi l'evento click al pulsante
            $("#btn-download-zip").on("click", function() {
                // Effettua una richiesta AJAX al tuo script PHP
                $.ajax({
                    type: "POST",
                    url: "../req/avanzate_fx/download_zip.php", // Sostituisci con il percorso del tuo script PHP
                    success: function(data) {
                        // Crea un link temporaneo per scaricare il file ZIP
                        var link = document.createElement("a");
                        link.href = data;
                        link.download = "archivio_sbobine.zip";
                        document.body.appendChild(link);

                        // Simula il clic sul link per avviare il download
                        link.click();

                        // Rimuove il link temporaneo
                        document.body.removeChild(link);
                    },
                    error: function() {
                        alert("Si è verificato un errore durante il download.");
                    }
                });
            });
            $("#btn-download-all").on("click", function() {
                // Effettua una richiesta AJAX al tuo script PHP
                $.ajax({
                    type: "POST",
                    url: "../req/avanzate_fx/download_pdf.php", // Sostituisci con il percorso del tuo script PHP
                    success: function(data) {
                        // Crea un link temporaneo per scaricare il file ZIP
                        var link = document.createElement("a");
                        link.href = data;
                        document.body.appendChild(link);

                        // Simula il clic sul link per avviare il download
                        link.click();

                        // Rimuove il link temporaneo
                        document.body.removeChild(link);
                    },
                    error: function() {
                        alert("Si è verificato un errore durante il download.");
                    }
                });
            });
        });


    </script>
    <script>
        $(document).ready(function() {
            // Aggiungi l'evento click al pulsante
            $("#btn-elimina-sbob").on("click", function() {
                // Mostra la finestra modale di conferma
                if (confirm("Confermi di voler eliminare tutte le sbobine?")) {
                    // Effettua una richiesta AJAX al file PHP "elimina.php"
                    $.ajax({
                        type: "POST",
                        url: "../req/avanzate_fx/delete_all_sbobine.php", // Sostituisci con il percorso del tuo file PHP
                        success: function(data) {
                            // Gestisci la risposta del server dopo l'eliminazione
                            alert(data);
                            // Esegui altre azioni se necessario...
                        },
                        error: function() {
                            alert("Si è verificato un errore durante l'eliminazione delle sbobine.");
                        }
                    });
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Aggiungi l'evento click al pulsante
            $("#btn-elimina-recsbo").on("click", function() {
                // Mostra la finestra modale di conferma
                if (confirm("Confermi di voler eliminare il record delle sbobine?")) {
                    // Effettua una richiesta AJAX al file PHP "ele.php"
                    $.ajax({
                        type: "POST",
                        url: "../req/avanzate_fx/delete_record_sbobine.php", // Sostituisci con il percorso del tuo file PHP
                        success: function(data) {
                            // Gestisci la risposta del server dopo l'eliminazione del record
                            alert(data);
                            // Esegui altre azioni se necessario...
                        },
                        error: function() {
                            alert("Si è verificato un errore durante l'eliminazione del record delle sbobine.");
                        }
                    });
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Aggiungi l'evento click al pulsante
            $("#btn-elimina-ins").on("click", function() {
                // Mostra la finestra modale di conferma
                if (confirm("Confermi di voler eliminare gli insegnamenti attuali?")) {
                    // Effettua una richiesta AJAX al file PHP "elimina_insegnamenti.php"
                    $.ajax({
                        type: "POST",
                        url: "../req/avanzate_fx/delete_record_insegnamenti.php",
                        success: function(data) {
                            // Gestisci la risposta del server dopo l'eliminazione degli insegnamenti
                            alert(data);
                            // Esegui altre azioni se necessario...
                        },
                        error: function() {
                            alert("Si è verificato un errore durante l'eliminazione degli insegnamenti.");
                        }
                    });
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Aggiungi l'evento click al pulsante
            $("#btn-elimina-usr").on("click", function() {
                // Mostra la finestra modale di conferma
                if (confirm("Confermi di voler eliminare gli utenti? Nota che gli utenti SuperUser non verranno eliminati.")) {
                    // Effettua una richiesta AJAX al file PHP "elimina_utenti.php"
                    $.ajax({
                        type: "POST",
                        url: "../req/avanzate_fx/delete_users.php",
                        success: function(data) {
                            // Gestisci la risposta del server dopo l'eliminazione degli utenti
                            alert(data);
                            // Esegui altre azioni se necessario...
                        },
                        error: function() {
                            alert("Si è verificato un errore durante l'eliminazione degli utenti.");
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
    echo 'Utente NON abilitato';
    //header("Location: ../templates/login.php");
    exit();
}
?>
