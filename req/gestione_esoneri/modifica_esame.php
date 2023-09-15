<?php
if (isset($_POST['idEsame'])) {
    // Connessione al database
    include '../../db_connector.php';

    // Verifica della connessione
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    // Ottieni i dati dalla richiesta POST
    $idEsame = $_POST['idEsame'];
    $insegnamento = $_POST['insegnamento'];
    $docente = $_POST['docente'];
    $dataEsonero = $_POST['dataEsonero'];
    $dataScadiscrizioni = $_POST['dataScadiscrizioni'];

    // Query per aggiornare i dati dell'esame
    $queryModifica = "UPDATE sx_esamidisponibili SET insegnamento = ?, docente = ?, data_esonero = ?, data_scadiscrizioni = ? WHERE id = ?";
    $stmtModifica = $conn->prepare($queryModifica);
    $stmtModifica->bind_param("ssssi", $insegnamento, $docente, $dataEsonero, $dataScadiscrizioni, $idEsame);

    if ($stmtModifica->execute()) {
        $stmtModifica->close();

        // Chiudi la connessione al database
        $conn->close();

        echo 'success';
    } else {
        echo 'Errore durante la modifica';
    }
} else {
    echo 'Parametri non impostati correttamente.';
}
?>

