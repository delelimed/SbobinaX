<?php
// Connessione al database
include '../db_connector.php';
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Verifica se la richiesta è stata inviata tramite metodo GET
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['idSbobina'])) {
    // Recupera l'ID sbobina inviato dalla chiamata AJAX
    $idSbobina = $_GET['idSbobina'];

    // Esegui la query per ottenere i dati della sbobina corrispondente all'ID
    $query = "SELECT * FROM sbobine_calendarizzate WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $idSbobina);
    $stmt->execute();
    $result = $stmt->get_result();

    // Estrai i dati della sbobina
    $sbobina = $result->fetch_assoc();

    // Chiudi la connessione al database
    $stmt->close();
    $conn->close();

    // Invia i dati della sbobina come risposta in formato JSON
    header('Content-Type: application/json');
    echo json_encode($sbobina);
} else {
    // Se la richiesta non è corretta o manca l'ID sbobina, invia una risposta di errore
    header('HTTP/1.1 400 Bad Request');
    echo 'Richiesta non valida';
}
?>
