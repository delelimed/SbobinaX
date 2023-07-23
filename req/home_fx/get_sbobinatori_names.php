<?php
// Connessione al database (sostituisci queste variabili con le tue credenziali)
include '../../db_connector.php';

// Controlla se è stato fornito un array di ID degli sbobinatori come parametro nella chiamata
if (isset($_GET['sbobinatori_ids'])) {
    $sbobinatori_ids = $_GET['sbobinatori_ids'];

    // Converti l'array di ID degli sbobinatori in una stringa separata da virgole per la query SQL
    $sbobinatori_ids_string = implode(',', $sbobinatori_ids);

    // Query per recuperare i nomi degli sbobinatori associati agli ID specificati
    $query = "SELECT nome, cognome FROM users WHERE id IN ($sbobinatori_ids_string)";
    $result = $conn->query($query);

    $sbobinatori_names = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Concatena nome e cognome per ottenere il nome completo dello sbobinatore
            $sbobinatori_names[] = $row['nome'] . ' ' . $row['cognome'];
        }
    }

    // Restituisci i nomi degli sbobinatori come JSON
    header('Content-Type: application/json');
    echo json_encode($sbobinatori_names);
} else {
    // Nessun ID degli sbobinatori fornito nella chiamata
    // Restituisci un valore di default o un messaggio di errore, a seconda del tuo caso d'uso
    echo json_encode(array("error" => "ID degli sbobinatori non forniti."));
}

// Chiudi la connessione al database
$conn->close();
?>
