<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['nome']) && $_SESSION['admin'] == 1 && $_SESSION['locked'] == 0){

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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

        <!-- Link CSS di Bootstrap Switch -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-switch@3.3.4/dist/css/bootstrap3/bootstrap-switch.min.css">

        <!-- Link jQuery (assicurati di includerlo prima di bootstrap.min.js) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Link di Bootstrap JS (assicurati di includerlo dopo jQuery) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

        <!-- Link di Bootstrap Switch JS (assicurati di includerlo dopo Bootstrap JS) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-switch@3.3.4/dist/js/bootstrap-switch.min.js"></script>

        <script>
            // Inizializza gli switch bootstrap quando il documento è pronto
            $(document).ready(function () {
                $("[data-bootstrap-switch]").bootstrapSwitch();
            });
        </script>



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
                            <h3 class="card-title">Limite di Ammonizioni</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <?php
                        include "../db_connector.php";

                        // Verifica la connessione
                        if ($conn->connect_error) {
                            die("Connessione al database fallita: " . $conn->connect_error);
                        }

                        // Gestione della richiesta POST
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $nuovoValore = $_POST["Limite"];

                            // Query per aggiornare il valore delle ammonizioni
                            $queryUpdate = "UPDATE sx_settings SET attuale = '$nuovoValore' WHERE nome_impostazione = 'ammonizioni'";

                            if ($conn->query($queryUpdate) === TRUE) {
                                echo "Valore delle ammonizioni aggiornato con successo!";
                            } else {
                                echo "Errore durante l'aggiornamento: " . $conn->error;
                            }
                        }

                        // Query per ottenere il valore delle ammonizioni
                        $query = "SELECT attuale FROM sx_settings WHERE nome_impostazione = 'ammonizioni'";
                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            // Estrai il valore
                            $row = $result->fetch_assoc();
                            $valoreAmmonizioni = $row['attuale'];
                        } else {
                            $valoreAmmonizioni = "Valore non trovato";
                        }

                        // Chiudi la connessione al database
                        $conn->close();
                        ?>

                        <form method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="Limite">Dopo quante ammonizioni vuoi bloccare gli account?</label>
                                    <input type="number" class="form-control" id="Limite" name="Limite" placeholder="Inserisci il numero di ammonizioni" value="<?php echo $valoreAmmonizioni; ?>">
                                    <button type="submit" id="btn-save-ammonizioni" class="btn btn-block btn-primary" name="submit">SALVA AMMONIZIONI</button>
                                </div>
                            </div>

                        </form>
                    </div>


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
                                    <button type="button" id="btn-download-all" class="btn btn-block btn-primary" data-action="download_zip">1. Scarica TUTTE le sbobine singolarmente (se pulsante sopra non funziona)</button>
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

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Configurazione Server SMTP - Invio Email (attivata in una prossima versione)</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="settingsForm">
                            <input type="hidden" name="action" value="get_data">

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="ServerSMTP">Server SMTP Primario</label>
                                    <input type="text" class="form-control" id="ServerSMTP" name="ServerSMTP" placeholder="Inserisci il Nome del Server" value="<?php echo isset($data['ServerSMTP']) ? $data['ServerSMTP'] : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="NPorta">Numero Porta</label>
                                    <input type="number" class="form-control" id="NPorta" name="NPorta" placeholder="Inserisci il Numero della Porta (1 - 65535)" value="<?php echo isset($data['NPorta']) ? $data['NPorta'] : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="UtenteSMPT">Utente SMTP</label>
                                    <input type="text" class="form-control" id="UtenteSMTP" name="UtenteSMTP" placeholder="Inserisci il Nome Utente" value="<?php echo isset($data['UtenteSMTP']) ? $data['UtenteSMTP'] : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="PSSWSMTP">Password SMTP</label>
                                    <input type="password" class="form-control" id="PSSWSMTP" name="PSSWSMTP" placeholder="Inserisci la Password" value="<?php echo isset($data['PSSWSMTP']) ? $data['PSSWSMTP'] : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="MailSMTP">Email di Invio</label>
                                    <input type="email" class="form-control" id="MailSMTP" name="MailSMTP" placeholder="Inserisci la Mail di invio" value="<?php echo isset($data['MailSMTP']) ? $data['MailSMTP'] : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="smtp_attivo" value="off">
                                    <label for="SwitchEmailProva">Abilita SMTP (ON: invio email; OFF: non invio email)</label>
                                    <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-focused bootstrap-switch-animate bootstrap-switch-on" style="width: 86px;">
                                        <div class="bootstrap-switch-container" style="width: 126px; margin-left: 0px;">
                                            <input type="checkbox" id="smtp_attivo" name="smtp_attivo" <?php echo isset($data['smtp_attivo']) && $data['smtp_attivo'] == 1 ? 'checked' : ''; ?> data-bootstrap-switch="" data-off-color="danger" data-on-color="success">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Salva i Dati</button>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-info" id="btnInviaEmail">Invia EMAIL di prova</button>
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
            <strong>Copyright &copy; 2023 <a href="https://devdeleli.github.io/" target="_blank" rel="noopener noreferrer">DEVDELELI</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->


    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/dist/js/adminlte.min.js"></script>

    <script>

        // Assumendo che tu utilizzi jQuery per semplificare le chiamate Ajax
        $(document).ready(function() {
            // Effettua la chiamata Ajax al backend per ottenere il valore delle ammonizioni
            $.ajax({
                url: 'url_del_tuo_backend', // Sostituisci con l'URL del tuo backend
                method: 'GET', // O il metodo appropriato per ottenere i dati
                data: { nome_impostazione: 'ammonizioni' }, // Eventuali dati da inviare al backend
                success: function(data) {
                    // Aggiorna il valore nell'elemento span
                    $('#ammonizioni-value').text(data);
                },
                error: function(error) {
                    console.log('Errore durante la richiesta Ajax:', error);
                }
            });
        });


    </script>

    <script>
        $('#btnInviaEmail').on('click', function() {
            // Invia una richiesta POST a mail_prova.php
            $.post('../req/email_fx/mail_prova.php', function(data) {
                // Questa funzione verrà eseguita quando la richiesta POST avrà successo
                // Puoi aggiungere ulteriori azioni qui, ad esempio, mostrare un messaggio di conferma
                alert('Email di prova inviata con successo!');
            }).fail(function() {
                // Questa funzione verrà eseguita se la richiesta POST fallisce
                alert('Errore nell\'invio dell\'email di prova.');
            });
        });
        // Inizializza gli switch bootstrap quando il documento è pronto
        $(document).ready(function () {
            $("[data-bootstrap-switch]").bootstrapSwitch();

            // Funzione per eseguire la richiesta AJAX
            function getDataFromServer() {
                $.ajax({
                    url: "../req/avanzate_fx/get_SMTP_data.php",
                    type: "POST",
                    data: $("#settingsForm").serialize(), // Invia i dati del form al server
                    success: function (response) {
                        // Popola il form con i dati ricevuti dal server
                        var data = JSON.parse(response);
                        $("#ServerSMTP").val(data.ServerSMTP || '');
                        $("#NPorta").val(data.NPorta || '');
                        $("#UtenteSMTP").val(data.UtenteSMTP || '');
                        $("#PSSWSMTP").val(data.PSSWSMTP || '');
                        $("#MailSMTP").val(data.MailSMTP || '');
                        $("#smtp_attivo").bootstrapSwitch('state', data.smtp_attivo === 'on' ? true : false, true);
                    },
                    error: function () {
                        console.log("Errore durante la richiesta AJAX");
                    }
                });
            }

            // Richiama la funzione di richiesta dati all'avvio della pagina
            getDataFromServer();

            // Funzione per gestire l'invio del form
            $("#settingsForm").on("submit", function (event) {
                event.preventDefault(); // Impedisci il comportamento predefinito del form

                // Esegui la richiesta AJAX per salvare i dati
                $.ajax({
                    url: "../req/avanzate_fx/save_SMTP_data.php",
                    type: "POST",
                    data: $(this).serialize(), // Serializza i dati del form
                    success: function (response) {
                        alert(response); // Visualizza una notifica con il messaggio di risposta dal server
                    },

                });
            });
        });
    </script>



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
