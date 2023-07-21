<?php
// programma_sbobina.php

include "../db_connector.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ottieni i dati dal form
    $idInsegnamento = $_POST['insegnamento'];
    $dataLezione = $_POST['data_lezione'];
    $revisionata = 0; // Il valore di default per il campo revisionata

    // Formatta la data nel formato corretto "YYYY-MM-DD"
    $dataLezioneFormatted = date('Y-m-d', strtotime($dataLezione));

    // Verifica eventuali errori di connessione
    if ($conn->connect_error) {
        die("Connessione al database fallita: " . $conn->connect_error);
    }

    // Prepara e esegui la query per inserire i dati nel database
    $query = "INSERT INTO sbobine_calendarizzate (insegnamento, data_lezione, revisione) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sss', $idInsegnamento, $dataLezioneFormatted, $revisionata);

    // Esegui l'inserimento nel database
    if ($stmt->execute()) {
        // L'inserimento è avvenuto con successo
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

    // Chiudi lo statement e la connessione al database
    $stmt->close();
    $conn->close();

    // Redirect alla pagina di origine con il messaggio di successo o errore
    $redirectUrl = '../templates/Programma_Sbobine.php'; // Sostituisci con l'URL della tua pagina di origine
    header("Location: $redirectUrl?status=" . urlencode($response['message']));
    exit();
}
?>
