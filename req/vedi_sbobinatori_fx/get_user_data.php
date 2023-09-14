<?php
// Simula la connessione a un database (questa parte dipende dal tuo database)
include '../../db_connector.php';

// Controlla la connessione al database
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Controlla se è presente l'ID dell'utente nella richiesta GET
if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Query parametrizzata per ottenere i dati dell'utente dal database
    $query = "SELECT * FROM sx_users WHERE id = ?";

    // Prepara la query
    $stmt = $conn->prepare($query);

    // Lega il parametro
    $stmt->bind_param("i", $userId);

    // Esegui la query
    $stmt->execute();

    // Ottieni il risultato
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Estrai i dati dell'utente e restituiscili come JSON
        $userData = $result->fetch_assoc();
        echo json_encode($userData);
    } else {
        // Nessun utente trovato con quell'ID, restituisci un oggetto JSON vuoto
        echo json_encode((object)array());
    }

    // Chiudi il prepared statement
    $stmt->close();
} else {
    // L'ID dell'utente non è stato fornito nella richiesta GET, restituisci un oggetto JSON vuoto
    echo json_encode((object)array());
}

// Chiudi la connessione al database
$conn->close();
?>

