<?php
// Connetti al database (sostituisci con i tuoi dati di connessione)
include "../../db_connector.php";
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Verifica l'azione richiesta
if ($_POST['action'] === 'get_data') {
    // Query per ottenere i dati dalla tabella "settings"
    $sql = "SELECT nome_impostazione, attuale FROM settings";
    $result = $conn->query($sql);

    // Array associativo per memorizzare i dati
    $data = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[$row['nome_impostazione']] = $row['attuale'];
        }
    }

    // Chiudi la connessione al database
    $conn->close();

    // Restituisci i dati come JSON
    echo json_encode($data);
}
?>
