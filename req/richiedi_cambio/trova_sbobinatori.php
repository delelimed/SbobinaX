<?php
// Connessione al database (assicurati di inserire le tue credenziali corrette)
include '../../db_connector.php';

// Verifica della connessione
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Ottieni l'id_sbobina dalla richiesta GET
$idSbobina = $_GET['id_sbobina'];

// Query SQL utilizzando una prepared statement per ottenere gli sbobinatori
$query = "SELECT id_sbobinatore FROM sx_sbobinatori_sbobine WHERE id_sbobina = ?";
$stmt = $conn->prepare($query);

if ($stmt) {
    // Associa il parametro a "id_sbobina"
    $stmt->bind_param("i", $idSbobina); // Usa "i" per id numerico intero

    // Esegui la query
    $stmt->execute();

    // Ottieni il risultato
    $result = $stmt->get_result();

    $sbobinatori = array();

    // Estrai i risultati in un array associativo con chiave "id_sbobinatore"
    while ($row = $result->fetch_assoc()) {
        $sbobinatori[] = array('id_sbobinatore' => $row['id_sbobinatore']);
    }

    // Restituisci l'array JSON degli sbobinatori
    echo json_encode($sbobinatori);
} else {
    // Errore nella preparazione della query
    echo "Errore nella preparazione della query";
}

// Chiudi la connessione al database
$conn->close();
?>
