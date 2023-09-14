<?php
// Connessione al database (sostituisci con i tuoi dati di connessione)
include '../../db_connector.php';

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Query per eliminare tutti i record dalla tabella insegnamenti
$sql = "DELETE FROM sx_insegnamenti";

if ($conn->query($sql) === TRUE) {
    echo "Tutti i record nella tabella insegnamenti sono stati cancellati correttamente.";
} else {
    echo "Si è verificato un errore durante la cancellazione: " . $conn->error;
}

// Chiusura della connessione al database
$conn->close();
?>


