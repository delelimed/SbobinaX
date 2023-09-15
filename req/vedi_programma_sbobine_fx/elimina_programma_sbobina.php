<?php
include '../../db_connector.php';

// Verifica se la richiesta è stata inviata tramite metodo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera l'ID sbobina dalla richiesta POST
    $idSbobina = $_POST['idSbobina'];

    // Esegui una query per ottenere il percorso del file dal database
    $queryGetFile = "SELECT posizione_server FROM sx_sbobine_calendarizzate WHERE id = ?";
    $stmtGetFile = $conn->prepare($queryGetFile);
    $stmtGetFile->bind_param('i', $idSbobina);
    $stmtGetFile->execute();
    $stmtGetFile->store_result();

    // Verifica se esiste un record per l'ID specificato
    if ($stmtGetFile->num_rows > 0) {
        // Ottieni il percorso del file dal risultato della query
        $stmtGetFile->bind_result($percorsoFile);
        $stmtGetFile->fetch();

        // Verifica se il file esiste fisicamente sul server
        if (file_exists($percorsoFile)) {
            // Elimina il file fisicamente dal server
            if (unlink($percorsoFile)) {
                // Se l'eliminazione del file è riuscita, procedi con l'eliminazione della sbobina dal database

                // Esegui la query per eliminare la sbobina dal database
                $queryDelete = "DELETE FROM sx_sbobine_calendarizzate WHERE id = ?";
                $stmtDelete = $conn->prepare($queryDelete);
                $stmtDelete->bind_param('i', $idSbobina);

                if ($stmtDelete->execute()) {
                    // L'eliminazione è stata completata con successo
                    // Puoi inviare una risposta al client, se necessario
                    echo 'Sbobina eliminata correttamente';
                } else {
                    // Si è verificato un errore durante l'eliminazione dal database
                    // Puoi inviare un messaggio di errore al client, se necessario
                    echo 'Si è verificato un errore durante l\'eliminazione della sbobina dal database: ' . $stmtDelete->error;
                }

                $stmtDelete->close();
            } else {
                // Si è verificato un errore durante l'eliminazione del file
                // Puoi inviare un messaggio di errore al client, se necessario
                echo 'Si è verificato un errore durante l\'eliminazione del file';
            }
        } else {
            // Se il file non esiste, procedi comunque con l'eliminazione della sbobina dal database

            // Esegui la query per eliminare la sbobina dal database
            $queryDelete = "DELETE FROM sx_sbobine_calendarizzate WHERE id = ?";
            $stmtDelete = $conn->prepare($queryDelete);
            $stmtDelete->bind_param('i', $idSbobina);

            if ($stmtDelete->execute()) {
                // L'eliminazione è stata completata con successo
                // Puoi inviare una risposta al client, se necessario
                echo 'Sbobina eliminata correttamente';
            } else {
                // Si è verificato un errore durante l'eliminazione dal database
                // Puoi inviare un messaggio di errore al client, se necessario
                echo 'Si è verificato un errore durante l\'eliminazione della sbobina dal database: ' . $stmtDelete->error;
            }

            $stmtDelete->close();
        }

        // Chiudi la connessione al database
        $stmtGetFile->close();
    } else {
        // Nessuna sbobina trovata con l'ID specificato
        echo 'Sbobina non trovata';
    }

    // Chiudi la connessione al database
    $conn->close();
}
?>
