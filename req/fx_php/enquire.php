<?php
// Connessione al database (sostituisci con le tue credenziali)
include "../../db_connector.php";

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Ottenere l'ID dell'utente corrente (supponiamo che tu abbia già questa informazione)
$current_user_id = 1; // Sostituisci con l'ID dell'utente corrente

// Query per ottenere gli ID delle sbobine assegnate all'utente corrente
$sql = "SELECT sbobina_id FROM sx_revisori_sbobine WHERE id_revisore = $current_user_id";
$result = $conn->query($sql);

// Array per memorizzare gli ID delle sbobine
$sbobine_ids = array();

if ($result->num_rows > 0) {
    // Memorizza gli ID delle sbobine nell'array
    while ($row = $result->fetch_assoc()) {
        $sbobine_ids[] = $row['sbobina_id'];
    }
}

// Chiudi la connessione al database
$conn->close();
?>

