<?php
if (isset($_POST['idEsame'])) {
    // Connessione al database
    include '../../db_connector.php';

    // Verifica della connessione
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    // Ottieni l'id dell'esame per il caricamento dei dati
    $idEsame = $_POST['idEsame'];

    // Query per ottenere i dati dell'esame
    $queryEsame = "SELECT insegnamento, docente, data_esonero, data_scadiscrizioni FROM sx_esamidisponibili WHERE id = ?";
    $stmtEsame = $conn->prepare($queryEsame);
    $stmtEsame->bind_param("i", $idEsame);
    $stmtEsame->execute();
    $stmtEsame->bind_result($insegnamento, $docente, $dataEsonero, $dataScadiscrizioni);

    if ($stmtEsame->fetch()) {
        $esameData = array(
            'insegnamento' => $insegnamento,
            'docente' => $docente,
            'data_esonero' => $dataEsonero,
            'data_scadiscrizioni' => $dataScadiscrizioni
        );

        // Restituisci i dati dell'esame come JSON
        echo json_encode($esameData);
    } else {
        echo 'Errore durante il caricamento dei dati dell\'esame';
    }

    $stmtEsame->close();

    // Chiudi la connessione al database
    $conn->close();
} else {
    echo 'Parametro idEsame non impostato.';
}
?>
