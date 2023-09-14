<?php
// Connessione al database (sostituisci queste variabili con le tue credenziali)
include '../../db_connector.php';

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Ottieni l'ID dell'insegnamento dalla query string
if (isset($_GET['id'])) {
    $insegnamento_id = $_GET['id'];
} else {
    die("ID insegnamento non fornito.");
}

// Query parametrica per recuperare l'insegnamento in base all'ID fornito
$sql = "SELECT materia FROM sx_insegnamenti WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $insegnamento_id);
$stmt->execute();
$result = $stmt->get_result();

// Verifica se l'insegnamento è stato trovato
if ($result->num_rows > 0) {
    // Estrai il risultato (dovrebbe esserci solo una riga)
    $insegnamento = $result->fetch_assoc();

    // Chiudi la connessione al database
    $stmt->close();
    $conn->close();

    // Restituisci il risultato come JSON
    header('Content-Type: application/json');
    echo json_encode($insegnamento);
} else {
    // L'insegnamento non è stato trovato
    $stmt->close();
    $conn->close();
    die("Insegnamento non trovato.");
}
?>

