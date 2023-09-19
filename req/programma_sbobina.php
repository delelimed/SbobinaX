<?php
// programma_sbobina.php

include "../db_connector.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ottieni i dati dal form
    $idInsegnamento = $_POST['insegnamento'];
    $dataLezione = $_POST['data_lezione'];
    $progressivoSbobina = $_POST['progressivo_sbobina'];
    $numSbobinatori = $_POST['num_sbobinatori'];
    $numRevisori = $_POST['num_revisori'];
    $revisionata = 0; // Il valore di default per il campo revisionata
    $caricata = 0; // Il valore di default per il campo caricata


    // Formatta la data nel formato corretto "YYYY-MM-DD"
    $dataLezioneFormatted = date('Y-m-d', strtotime($dataLezione));

    // Verifica eventuali errori di connessione
    if ($conn->connect_error) {
        die("Connessione al database fallita: " . $conn->connect_error);
    }

    // Prepara e esegui la query per inserire i dati nella tabella sbobine_calendarizzate utilizzando prepared statements
    $query = "INSERT INTO sx_sbobine_calendarizzate (insegnamento, data_lezione, progressivo_insegnamento, caricata, revisione, num_sbobinatori, num_revisori) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sssiiis', $idInsegnamento, $dataLezioneFormatted, $progressivoSbobina, $caricata, $revisionata, $numSbobinatori, $numRevisori);

    // Esegui l'inserimento nella tabella sbobine_calendarizzate
    if ($stmt->execute()) {
        // L'inserimento nella tabella sbobine_calendarizzate è avvenuto con successo, otteniamo l'id della sbobina appena inserita
        $sbobinaId = $stmt->insert_id;

        // Memorizza gli sbobinatori associati alla sbobina nella tabella sbobinatori_sbobine
        if (isset($_POST['sbobinatori'])) {
            $sbobinatoriAssociati = $_POST['sbobinatori'];

            foreach ($sbobinatoriAssociati as $sbobinatoreId) {
                $query = "INSERT INTO sx_sbobinatori_sbobine (id_sbobinatore, id_sbobina) VALUES (?, ?)";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('ii', $sbobinatoreId, $sbobinaId);
                $stmt->execute();
            }
        }

        // Memorizza i revisori associati alla sbobina nella tabella revisori_sbobine
        if (isset($_POST['revisori'])) {
            $revisoriAssociati = $_POST['revisori'];

            foreach ($revisoriAssociati as $revisoreId) {
                $query = "INSERT INTO sx_revisori_sbobine (id_revisore, id_sbobina) VALUES (?, ?)";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('ii', $revisoreId, $sbobinaId);
                $stmt->execute();
            }
        }

        // Successo: crea il messaggio di successo
        $response = array(
            'success' => true,
            'message' => 'Sbobina registrata con successo!',
        );
    } else {
        // Errore durante l'inserimento
        $response = array(
            'success' => false,
            'message' => 'Errore durante la registrazione della sbobina: ' . $conn->error,
        );
    }

    // Chiudi la connessione al database
    $conn->close();

    // Redirect alla pagina di origine con il messaggio di successo o errore
    $redirectUrl = '../templates/Programma_Sbobine.php'; // Sostituisci con l'URL della tua pagina di origine
    header("Location: $redirectUrl?status=" . urlencode($response['message']));
    exit();
}
?>

