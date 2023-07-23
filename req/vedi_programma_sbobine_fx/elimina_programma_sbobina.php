<?php
// Connessione al database
include '../../db_connector.php';

// Verifica se la richiesta è stata inviata tramite metodo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera l'ID sbobina dalla richiesta POST
    $idSbobina = $_POST['idSbobina'];

    // Esegui la query per eliminare la sbobina dal database
    $query = "DELETE FROM sbobine_calendarizzate WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $idSbobina);

    if ($stmt->execute()) {
        // L'eliminazione è stata completata con successo
        // Puoi inviare una risposta al client, se necessario
        echo 'Sbobina eliminata correttamente';
    } else {
        // Si è verificato un errore durante l'eliminazione
        // Puoi inviare un messaggio di errore al client, se necessario
        echo 'Si è verificato un errore durante l\'eliminazione della sbobina: ' . $stmt->error;
    }

    // Chiudi la connessione al database
    $stmt->close();
    $conn->close();
}
?>
