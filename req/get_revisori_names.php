<?php
// Connessione al database (sostituisci queste variabili con le tue credenziali)
include '../db_connector.php';

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Controlla se è stato fornito l'ID della sbobina come parametro nella chiamata
if (isset($_GET['sbobina_id'])) {
    $sbobina_id = $_GET['sbobina_id'];

    // Query per recuperare i nomi dei revisori associati all'ID della sbobina
    $query = "SELECT nome, cognome FROM users
              INNER JOIN revisori_sbobine ON users.id = revisori_sbobine.id_revisore
              WHERE revisori_sbobine.id_sbobina = $sbobina_id";
    $result = $conn->query($query);

    $revisori_names = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Concatena nome e cognome per ottenere il nome completo del revisore
            $revisori_names[] = $row['nome'] . ' ' . $row['cognome'];
        }
    }

    // Restituisci i nomi dei revisori come JSON
    header('Content-Type: application/json');
    echo json_encode($revisori_names);
} else {
    // L'ID della sbobina non è stato fornito nella chiamata
    // Restituisci un valore di default o un messaggio di errore, a seconda del tuo caso d'uso
    echo json_encode(array("error" => "ID della sbobina non fornito."));
}

// Chiudi la connessione al database
$conn->close();
?>

