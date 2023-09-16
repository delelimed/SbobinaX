<?php
// Connessione al database (assicurati di inserire le tue credenziali corrette)
include '../../db_connector.php';

// Verifica della connessione
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Ottieni l'id_sbobina dalla richiesta GET
$idSbobina = $_GET['id_sbobina'];

// Query SQL utilizzando una prepared statement
$query = "SELECT insegnamento, data_lezione FROM sx_sbobine_calendarizzate WHERE id = ?";
$stmt = $conn->prepare($query);

if ($stmt) {
    // Associa il parametro all'id_sbobina
    $stmt->bind_param("i", $idSbobina);

    // Esegui la query
    $stmt->execute();

    // Ottieni i risultati
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = array();

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        // Restituisci i dati in formato JSON
        echo json_encode($data);
    } else {
        // Nessun risultato trovato
        echo json_encode(array('message' => 'Nessun risultato trovato'));
    }

    // Chiudi la prepared statement
    $stmt->close();
} else {
    // Errore nella preparazione della query
    echo json_encode(array('message' => 'Errore nella preparazione della query'));
}

// Chiudi la connessione al database
$conn->close();
?>
