<?php
// Connessione al database
include 'db_connector.php';
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Verifica se la richiesta è stata inviata tramite metodo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera i dati inviati dalla chiamata AJAX
    $idSbobina = $_POST['idSbobina'];
    $idInsegnamento = $_POST['idInsegnamento'];
    $dataLezione = $_POST['dataLezione'];

    // Esegui la query per aggiornare i dati nel database
    $query = "UPDATE sbobine_calendarizzate SET insegnamento = ?, data_lezione = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('isi', $idInsegnamento, $dataLezione, $idSbobina);

    if ($stmt->execute()) {
        // L'aggiornamento è stato completato con successo
        // Puoi inviare una risposta al client, se necessario
        echo 'Modifiche salvate correttamente';
    } else {
        // Si è verificato un errore durante l'aggiornamento
        // Puoi inviare un messaggio di errore al client, se necessario
        echo 'Si è verificato un errore durante il salvataggio delle modifiche: ' . $stmt->error;
    }

    // Chiudi la connessione al database
    $stmt->close();
    $conn->close();
}
?>
