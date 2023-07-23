<?php
// Esegui l'aggiornamento dei campi nella tabella sbobine_calendarizzate
include "../../db_connector.php";
$idSbobina = $_POST['id_sbobina'];

// Recupera il percorso del file dalla tabella sbobine_calendarizzate
$queryFile = "SELECT posizione_server FROM sbobine_calendarizzate WHERE id = $idSbobina";
$resultFile = $conn->query($queryFile);

if ($resultFile->num_rows > 0) {
    $rowFile = $resultFile->fetch_assoc();
    $percorsoFile = $rowFile['posizione_server'];

    // Cancella il file associato alla sbobina
    if (file_exists($percorsoFile)) {
        unlink($percorsoFile);
    }
}

// Esegui l'aggiornamento dei campi desiderati nella tabella sbobine_calendarizzate
$queryUpdate = "UPDATE sbobine_calendarizzate SET argomento = '', data_caricamento = '', caricata = '', revisionata = '', posizione_server = '' WHERE id = $idSbobina";
$resultUpdate = $conn->query($queryUpdate);

if ($resultUpdate) {
    echo 'success'; // Invia una risposta di successo al client
} else {
    echo 'error'; // Invia una risposta di errore al client
}
?>

