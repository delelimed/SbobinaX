<?php
// Connessione al database (sostituisci queste variabili con le tue credenziali)
include '../db_connector.php';

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Ottenere l'ID dell'utente corrente (puoi impostarlo come necessario)
$user_id = 1; // Sostituisci con l'ID utente corrente

// Query per recuperare le righe in base all'utente corrente ($user_id)
$sql = "SELECT sbobine_calendarizzate.id, sbobine_calendarizzate.insegnamento, sbobine_calendarizzate.data_lezione
        FROM sbobine_calendarizzate
        LEFT JOIN revisori_sbobine ON sbobine_calendarizzate.id = revisori_sbobine.id_sbobina
        LEFT JOIN sbobinatori_sbobine ON sbobine_calendarizzate.id = sbobinatori_sbobine.id_sbobina
        WHERE revisori_sbobine.id_revisore = $user_id OR sbobinatori_sbobine.id_sbobinatore = $user_id";

$result = $conn->query($sql);

// Array per contenere i risultati
$sbobine_array = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sbobine_array[] = $row;
    }
}

// Chiudi la connessione al database
$conn->close();

// Restituisci i risultati come JSON
header('Content-Type: application/json');
echo json_encode($sbobine_array);
?>

