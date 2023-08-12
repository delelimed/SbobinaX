<?php
// Connessione al database (sostituisci con i tuoi dati di connessione)
include '../../db_connector.php';

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Query per eliminare gli inserimenti con admin = 0
$sql = "DELETE FROM sx_users WHERE admin = 0";
if ($conn->query($sql) === TRUE) {
    echo "Tutti gli inserimenti con admin = 0 sono stati cancellati correttamente.";
} else {
    echo "Si è verificato un errore durante la cancellazione: " . $conn->error;
}

// Chiusura della connessione al database
$conn->close();
?>

