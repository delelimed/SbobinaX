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
                <a href="#" class="d-block"> <strong> Nome e Cognome </strong> </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item {% if active_menu == 'home' %}menu-open{% endif %}"> <!-- Home -->
                <li class="nav-item">
                    <a href="../templates/Home.php" class="nav-link">
                        <i class="fas fa-home nav-icon"></i>
                        <p>
                            Home
                        </p>
                    </a>
                    <?php
                    $page_name = '../templates/Home.php';
                    $active_menu = 'Home';

                    if ($_SERVER['PHP_SELF'] == $page_name && $active_menu == 'Home') {
                        echo '<span class="badge bg-success">Active</span>';
                    }
                    ?>
                </li>


                <li class="nav-item">
                    <?php
                    $active_menu = 'Upload';
                    $page_name = 'Upload.php';
                    ?>
                    <a href="../templates/Upload.php" class="nav-link">
                        <?php if ($_SERVER['PHP_SELF'] == $page_name && $active_menu == 'Upload') : ?>
                            <i class="fa fa-upload nav-icon" aria-hidden="true"></i>
                            <p>
                                Upload
                            </p>
                            <span class="badge bg-success">Active</span>
                        <?php else : ?>
                            <i class="fa fa-upload nav-icon" aria-hidden="true"></i>
                            <p>
                                Upload
                            </p>
                        <?php endif; ?>
                    </a>
                </li>


                <li class="nav-item">
                    <?php
                    $active_menu = 'Peer_Review';
                    $page_name = 'Peer_Review.php';
                    ?>
                    <a href="../templates/Peer_Review.php" class="nav-link">
                        <?php if ($_SERVER['PHP_SELF'] == $page_name && $active_menu == 'Peer_Review') : ?>
                            <i class="fa fa fa-eye nav-icon" aria-hidden="true"></i>
                            <p>
                                Peer Review
                            </p>
                            <span class="badge bg-success">Active</span>
                        <?php else : ?>
                            <i class="fa fa fa-eye nav-icon" aria-hidden="true"></i>
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
                        <?php if ($_SERVER['PHP_SELF'] == $page_name && $active_menu == 'Calendario') : ?>
                            <i class="fa fa-calendar nav-icon" aria-hidden="true"></i>
                            <p>
                                Calendario
                            </p>
                            <span class="badge bg-success">Active</span>
                        <?php else : ?>
                            <i class="fa fa-calendar nav-icon" aria-hidden="true"></i>
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
                        <?php if ($_SERVER['PHP_SELF'] == $page_name && $active_menu == 'Visualizza') : ?>
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



                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>
                            Impostazioni
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../templates/Inserisci_Sbobinatori.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Inserisci Sbobinatori
                                </p>
                                <?php
                                if ($_SERVER['PHP_SELF'] == 'Inserisci_Sbobinatori.php') {
                                    echo '<span class="badge bg-success">Active</span>';
                                }
                                ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../templates/Vedi_Sbobinatori.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Visualizza Sbobinatori
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../templates/Req_Sbobina.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Inserisci Programmazione Sbobina
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../templates/Vedi_Req_Sbobina.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Vedi Programmazione Sbobina
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>



                <?php
                $active_menu = 'Info';
                $page_name = 'Info.php';
                ?>
                <li class="nav-item">
                    <a href="../templates/Info.php" class="nav-link">
                        <?php if ($_SERVER['PHP_SELF'] == $page_name && $active_menu == 'Info') : ?>
                            <i class="fa fa-folder-open nav-icon" aria-hidden="true"></i>
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
                    <a href="{% url "logout" %}" class="nav-link">
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
    </div>
    <!-- /.sidebar -->
</aside>

