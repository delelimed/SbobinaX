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

    // Query per recuperare gli ID dei revisori associati all'ID della sbobina
    $query = "SELECT id_revisore FROM sx_revisori_sbobine WHERE id_sbobina = $sbobina_id";
    $result = $conn->query($query);

    $revisori_ids = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $revisori_ids[] = $row['id_revisore'];
        }
    }

    // Restituisci gli ID dei revisori come JSON
    header('Content-Type: application/json');
    echo json_encode($revisori_ids);
} else {
    // L'ID della sbobina non è stato fornito nella chiamata
    // Restituisci un valore di default o un messaggio di errore, a seconda del tuo caso d'uso
    echo json_encode(array("error" => "ID della sbobina non fornito."));
}

// Chiudi la connessione al database
$conn->close();
?>

