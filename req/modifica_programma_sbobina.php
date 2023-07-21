<?php
// Connessione al database
include '../db_connector.php';
// Verifica se la richiesta è stata inviata tramite metodo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera i dati inviati dalla chiamata AJAX
    $idSbobina = $_POST['idSbobina'];
    $nomeInsegnamento = $_POST['nomeInsegnamento']; // Correzione del nome della variabile
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

    } else {
        // Se l'insegnamento corrispondente non è stato trovato, invia un messaggio di errore
        echo 'Errore: Insegnamento non trovato.';
    }

    // Chiudi la connessione al database
    $stmtGetIdInsegnamento->close();
    $stmt->close();
    $conn->close();
}
?>
