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
    <title>SbobinaX | Calendario</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- fullCalendar -->

    <script src='../req/calendar_fx/custom.js'></script>
    <script src='https://fullcalendar.io/releases/core/main.js'></script>

    <script src="../assets/plugins/fullcalendar/dist/index.global.js"></script>
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
                        <h1 class="m-0">Calendario</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">

                    </div><!-- /.col -->
                </div><!-- /.row -->
                <!-- block content -->
                <section class="content">
                    <!-- content -->

                    <div id="calendario"></div>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
                    <script src="../assets/plugins/fullcalendar/dist/index.global.js"></script>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var calendarEl = document.getElementById('calendario');

                            // Funzione per ottenere i colori dal file "get_color.php"
                            function getColors(callback) {
                                var xhr = new XMLHttpRequest();
                                xhr.open('GET', '../req/calendar_fx/get_color.php', true);
                                xhr.onload = function() {
                                    if (xhr.status === 200) {
                                        var colors = JSON.parse(xhr.responseText);
                                        callback(colors);
                                    }
                                };
                                xhr.send();
                            }

                            getColors(function(colors) {
                                var calendar = new FullCalendar.Calendar(calendarEl, {
                                    events: {
                                        url: '../req/calendar_fx/events.php',
                                        method: 'GET'
                                    },
                                    eventColor: function(info) {
                                        var extendedProps = info.event.extendedProps;
                                        var id_sbobina = extendedProps.id_sbobina;
                                        var color = colors[id_sbobina] || 'gray';
                                        return color;
                                    },
                                    eventClick: function(info) {
                                        var title = info.event.title;
                                        var start = info.event.start;
                                        var argomento = info.event.extendedProps.argomento;
                                        var id_sbobinatori = info.event.extendedProps.id_sbobinatori;
                                        var id_revisori = info.event.extendedProps.id_revisori;

                                        var startDateString = start.toLocaleString('it-IT', {
                                            year: 'numeric',
                                            month: 'long',
                                            day: 'numeric'
                                        });
                                        var caricata = info.event.extendedProps.caricata;
                                            var revisionata = info.event.extendedProps.revisionata;

                                        var stato = '';
                                        if (caricata === 0 && revisionata === 0) {
                                            stato = 'Da Caricare';
                                            info.el.style.backgroundColor = 'red'; // Imposta il colore rosso per gli eventi "Da Caricare"
                                        } else if (caricata === 1 && revisionata === 0) {
                                            stato = 'Da Revisionare';
                                            info.el.style.backgroundColor = 'orange'; // Imposta il colore arancione per gli eventi "Da Revisionare"
                                        } else if (caricata === 1 && revisionata === 1) {
                                            stato = 'Disponibile';
                                            info.el.style.backgroundColor = 'green'; // Imposta il colore verde per gli eventi "Disponibile"
                                        } else {
                                            stato = 'Stato non definito';
                                            info.el.style.backgroundColor = 'gray'; // Imposta il colore grigio per gli eventi con stati non definiti
                                        }

                                        alert('Insegnamento: ' + title + '\nData Lezione: ' + startDateString + '\nArgomento: ' + argomento  + '\nSbobinatori: ' + id_sbobinatori + '\nRevisori: ' + id_revisori + '\nStato: ' + stato);
                                    }
                                });

                                calendar.render();
                            });
                        });
                    </script>

                    <!-- content -->
                </section>

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
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="../assets/plugins/moment/moment.min.js"></script>
<script src="../assets/plugins/fullcalendar/main.js"></script>

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


</body>
</html>

    <?php
}else{
    header("Location: ../templates/login.php");
    exit();
}
?>
