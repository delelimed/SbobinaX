<?php
// Connessione al database (sostituisci con i tuoi dati di connessione)
include '../../db_connector.php';

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Inizia la transazione
$conn->begin_transaction();

try {
    // Query per eliminare tutti i record dalla tabella partecipazione_sbobine
    $sql1 = "DELETE FROM sx_partecipazione_sbobine";
    $conn->query($sql1);

    // Query per eliminare tutti i record dalla tabella revisori_sbobine
    $sql2 = "DELETE FROM sx_revisori_sbobine";
    $conn->query($sql2);

    // Query per eliminare tutti i record dalla tabella sbobinatori_sbobine
    $sql3 = "DELETE FROM sx_sbobinatori_sbobine";
    $conn->query($sql3);

    // Query per eliminare tutti i record dalla tabella sbobine_calendarizzate
    $sql4 = "DELETE FROM sx_sbobine_calendarizzate";
    $conn->query($sql4);

    // Conferma la transazione
    $conn->commit();

    echo "Tutti i record sono stati cancellati correttamente.";

} catch (Exception $e) {
    // Rollback in caso di errore
    $conn->rollback();
    echo "Si è verificato un errore durante la cancellazione: " . $e->getMessage();
}

// Chiusura della connessione al database
$conn->close();
?>
