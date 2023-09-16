<?php
// Connessione al database (assicurati di inserire le tue credenziali corrette)
include '../../db_connector.php';
// Verifica della connessione
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Ottieni l'id_sbobina dalla richiesta GET
$idSbobina = $_GET['id_sbobina'];

// Query SQL utilizzando una prepared statement per ottenere i revisori
$query = "SELECT id_revisore FROM sx_revisori_sbobine WHERE id_sbobina = ?";
$stmt = $conn->prepare($query);

if ($stmt) {
    // Associa il parametro a "id_sbobina"
    $stmt->bind_param("i", $idSbobina); // Usa "i" per id numerico intero

    // Esegui la query
    $stmt->execute();

    // Ottieni il risultato
    $result = $stmt->get_result();

    $revisori = array();

    // Estrai i risultati in un array associativo con chiave "id_revisore"
    while ($row = $result->fetch_assoc()) {
        $revisori[] = array('id_revisore' => $row['id_revisore']);
    }

    // Restituisci l'array JSON dei revisori
    echo json_encode($revisori);
} else {
    // Errore nella preparazione della query
    echo "Errore nella preparazione della query";
}

// Chiudi la connessione al database
$conn->close();
?>
