<?php
// Connessione al database (assicurati di inserire le tue credenziali corrette)
include '../../db_connector.php';
// Verifica della connessione
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Ottieni gli ID dalla richiesta GET
$ids = explode(',', $_GET['ids']);

$nomiCognomi = array();

// Query SQL per ottenere i nomi e cognomi basati sugli ID con prepared statement
$query = "SELECT id, nome, cognome FROM sx_users WHERE id IN (";
$query .= implode(',', array_fill(0, count($ids), '?'));
$query .= ")";

$stmt = $conn->prepare($query);

if ($stmt) {
    // Crea un array di tipi di dati per i parametri (?)
    $types = str_repeat('i', count($ids)); // 'i' indica integer, adatta al tuo tipo di dati

    // Lega i parametri
    $stmt->bind_param($types, ...$ids);

    // Esegui la query
    $stmt->execute();

    // Ottieni il risultato
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $nomiCognomi[] = array(
            'id' => $row['id'],
            'nome' => $row['nome'],
            'cognome' => $row['cognome']
        );
    }

    // Chiudi il prepared statement
    $stmt->close();
}

// Restituisci un array JSON di nomi e cognomi
echo json_encode($nomiCognomi);

// Chiudi la connessione al database
$conn->close();
?>
