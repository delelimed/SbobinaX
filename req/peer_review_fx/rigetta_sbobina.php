<?php
// Esegui l'aggiornamento dei campi nella tabella sbobine_calendarizzate
include "../../db_connector.php";
$idSbobina = $_POST['id_sbobina'];
$idRevisore = $_POST['id_revisore'];
$motivazione = $_POST['motivazione'];

// Prepara la query per l'inserimento nella tabella sx_sbobine_rigettate
$queryInsert = "INSERT INTO sx_sbobine_rigettate (id_sbobina, id_revisore, motivo, id_sbobinatore)
                SELECT ?, ?, ?, s.id_sbobinatore
                FROM sx_sbobinatori_sbobine s
                WHERE s.id_sbobina = ?";

// Prepara la query per recuperare il percorso del file dalla tabella sbobine_calendarizzate
$queryFile = "SELECT posizione_server FROM sx_sbobine_calendarizzate WHERE id = ?";
$stmtFile = $conn->prepare($queryFile);
$stmtFile->bind_param("i", $idSbobina);
$stmtFile->execute();
$resultFile = $stmtFile->get_result();

if ($resultFile->num_rows > 0) {
    $rowFile = $resultFile->fetch_assoc();
    $percorsoFile = $rowFile['posizione_server'];

    // Cancella il file associato alla sbobina
    if (file_exists($percorsoFile)) {
        unlink($percorsoFile);
    }
}

// Prepara la query per l'aggiornamento dei campi desiderati nella tabella sbobine_calendarizzate
$queryUpdate = "UPDATE sx_sbobine_calendarizzate AS sbobine
                JOIN sx_revisori_sbobine AS revisori ON sbobine.id = revisori.id_sbobina
                SET sbobine.argomento = '',
                    sbobine.data_caricamento = '',
                    sbobine.caricata = '',
                    sbobine.revisione = '',
                    sbobine.posizione_server = '',
                    revisori.esito = 0
                WHERE sbobine.id = ?";

// Inizia una transazione per garantire l'integrità dei dati
$conn->begin_transaction();

try {
    // Esegui l'inserimento nella tabella sx_sbobine_rigettate
    $stmtInsert = $conn->prepare($queryInsert);
    $stmtInsert->bind_param("iisi", $idSbobina, $idRevisore, $motivazione, $idSbobina);
    $stmtInsert->execute();

    // Esegui l'aggiornamento nella tabella sx_sbobine_calendarizzate
    $stmtUpdate = $conn->prepare($queryUpdate);
    $stmtUpdate->bind_param("i", $idSbobina);
    $stmtUpdate->execute();

    // Conferma la transazione se tutto va bene
    $conn->commit();

    echo 'success'; // Invia una risposta di successo al client
} catch (Exception $e) {
    // Annulla la transazione in caso di errore
    $conn->rollback();

    echo 'error'; // Invia una risposta di errore al client
}
?>

