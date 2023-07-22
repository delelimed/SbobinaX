<?php
if (isset($_POST['sbobinaId'])) {
    $sbobinaId = $_POST['sbobinaId'];
    include "../../db_connector.php";

    // Esegui la query per cercare l'ID sbobina nella tabella "sbobine_calendarizzate" e ottenere i dati associati
    if ($conn->connect_error) {
        die('Connessione al database fallita: ' . $conn->connect_error);
    }

    $query = "SELECT insegnamento, data_lezione FROM sbobine_calendarizzate WHERE id = $sbobinaId";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // ID sbobina trovato, ottieni i dati associati
        $row = $result->fetch_assoc();
        $idInsegnamento = $row['insegnamento']; // Correggi il nome della colonna se necessario
        $dataLezione = $row['data_lezione'];

        // Invia i dati al client in formato JSON
        echo json_encode(['success' => true, 'idInsegnamento' => $idInsegnamento, 'dataLezione' => $dataLezione]);
    } else {
        // ID sbobina non trovato, mostra un messaggio di errore
        echo json_encode(['success' => false, 'message' => 'ID sbobina non trovato']);
    }

    $conn->close();
}
?>
