<?php
// Connessione al database
include '../db_connector.php';

// Verifica se la richiesta è stata inviata tramite metodo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera i dati inviati dalla chiamata AJAX
    $idSbobina = $_POST['idSbobina'];
    $nomeInsegnamento = $_POST['nomeInsegnamento']; // Utilizza il nome corretto della variabile
    $dataLezione = $_POST['dataLezione'];

    // Recupera l'ID dell'insegnamento dalla tabella "insegnamenti" in base al nome
    $queryGetIdInsegnamento = "SELECT id FROM insegnamenti WHERE materia = ?";
    $stmtGetIdInsegnamento = $conn->prepare($queryGetIdInsegnamento);
    $stmtGetIdInsegnamento->bind_param('s', $nomeInsegnamento);
    $stmtGetIdInsegnamento->execute();
    $resultGetIdInsegnamento = $stmtGetIdInsegnamento->get_result();

    if ($resultGetIdInsegnamento->num_rows === 1) {
        // Se è stato trovato un insegnamento corrispondente, ottieni l'ID
        $row = $resultGetIdInsegnamento->fetch_assoc();
        $idInsegnamento = $row['id'];

        // Esegui la query per aggiornare i dati nel database
        $queryUpdateSbobina = "UPDATE sbobine_calendarizzate SET insegnamento = ?, data_lezione = ? WHERE id = ?";
        $stmtUpdateSbobina = $conn->prepare($queryUpdateSbobina);
        $stmtUpdateSbobina->bind_param('isi', $idInsegnamento, $dataLezione, $idSbobina);


        if ($stmtUpdateSbobina->execute()) {
            // L'aggiornamento è stato completato con successo
            $queryDeleteSbobinatori = "DELETE FROM sbobinatori_sbobine WHERE id_sbobina = ?";
            $stmtDeleteSbobinatori = $conn->prepare($queryDeleteSbobinatori);
            $stmtDeleteSbobinatori->bind_param('i', $idSbobina);
            $stmtDeleteSbobinatori->execute();

            // Gestisci l'inserimento degli sbobinatori associati alla sbobina nella tabella sbobinatori_sbobine
            if (isset($_POST['sbobinatori'])) {
                $sbobinatoriAssociati = json_decode($_POST['sbobinatori'], true);


                // Inserisci gli sbobinatori associati alla sbobina
                foreach ($sbobinatoriAssociati as $sbobinatoreId) {
                    $queryInsertSbobinatore = "INSERT INTO sbobinatori_sbobine (id_sbobina, id_sbobinatore) VALUES (?, ?)";
                    $stmtInsertSbobinatore = $conn->prepare($queryInsertSbobinatore);
                    $stmtInsertSbobinatore->bind_param('ii', $idSbobina, $sbobinatoreId);
                    $stmtInsertSbobinatore->execute();
                }
            }

            // Gestisci l'inserimento dei revisori associati alla sbobina nella tabella revisori_sbobine
            if (isset($_POST['revisori'])) {
                $revisoriAssociati = $_POST['revisori'];

                // Elimina i revisori associati a questa sbobina prima di inserirli nuovamente
                $queryDeleteRevisori = "DELETE FROM revisori_sbobine WHERE id_sbobina = ?";
                $stmtDeleteRevisori = $conn->prepare($queryDeleteRevisori);
                $stmtDeleteRevisori->bind_param('i', $idSbobina);
                $stmtDeleteRevisori->execute();

                // Inserisci i revisori associati alla sbobina
                foreach ($revisoriAssociati as $revisoreId) {
                    $queryInsertRevisore = "INSERT INTO revisori_sbobine (id_revisore, id_sbobina) VALUES (?, ?)";
                    $stmtInsertRevisore = $conn->prepare($queryInsertRevisore);
                    $stmtInsertRevisore->bind_param('ii', $revisoreId, $idSbobina);
                    $stmtInsertRevisore->execute();
                }
            }

            // Chiudi la connessione al database
            $stmtGetIdInsegnamento->close();
            $stmtUpdateSbobina->close();
            $conn->close();

            // Puoi inviare una risposta al client, se necessario
            echo 'Modifiche salvate correttamente';
        } else {
            // Si è verificato un errore durante l'aggiornamento
            // Puoi inviare un messaggio di errore al client, se necessario
            echo 'Si è verificato un errore durante il salvataggio delle modifiche: ' . $stmtUpdateSbobina->error;
        }
    } else {
        // Se l'insegnamento corrispondente non è stato trovato, invia un messaggio di errore
        echo 'Errore: Insegnamento non trovato.';
    }
}
?>
