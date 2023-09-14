<?php
// Connessione al database (sostituisci queste variabili con le tue credenziali)
include '../../db_connector.php';

// Controlla se è stato fornito un array di ID degli sbobinatori come parametro nella chiamata
if (isset($_GET['sbobinatori_ids'])) {
    $sbobinatori_ids = $_GET['sbobinatori_ids'];

    // Creiamo un array con un numero uguale di marcatori "?" quanti sono gli ID degli sbobinatori
    $markers = str_repeat("?,", count($sbobinatori_ids) - 1) . "?";

    // Query parametrica per recuperare i nomi degli sbobinatori associati agli ID specificati
    $query = "SELECT nome, cognome FROM sx_users WHERE id IN ($markers)";
    $stmt = $conn->prepare($query);

    // Bindiamo i parametri dinamici
    $types = str_repeat("i", count($sbobinatori_ids)); // "i" rappresenta l'intero
    $stmt->bind_param($types, ...$sbobinatori_ids); // Utilizziamo l'operatore di propagazione (...) per passare gli ID come parametri separati

    $stmt->execute();

    $result = $stmt->get_result();

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

// Chiudi il prepared statement e la connessione al database
$stmt->close();
$conn->close();
?>

