<?php
// Connessione al database (assicurati di inserire le tue credenziali corrette)
include '../../db_connector.php';

// Verifica della connessione
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Ottieni il valore di "insegnamento" dalla richiesta GET
$insegnamento = $_GET['insegnamento'];

// Query SQL utilizzando una prepared statement per ottenere la materia
$query = "SELECT materia FROM sx_insegnamenti WHERE id = ?";
$stmt = $conn->prepare($query);

if ($stmt) {
    // Associa il parametro a "insegnamento"
    $stmt->bind_param("s", $insegnamento);

    // Esegui la query
    $stmt->execute();

    // Ottieni il risultato
    $stmt->bind_result($materia);

    // Estrai il risultato
    $stmt->fetch();

    // Restituisci il valore della materia
    echo $materia;
} else {
    // Errore nella preparazione della query
    echo "Errore nella preparazione della query";
}

// Chiudi la connessione al database
$conn->close();
?>
