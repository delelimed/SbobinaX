<?php
// Includi il file di connessione al database se necessario
include '../../db_connector.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera i dati inviati tramite POST
    $idEsame = $_POST['idEsame'];
    $matricola = $_POST['matricola'];
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];
    $dataora_prenotazione = $_POST['dataora_prenotazione'];

    // Esegui l'inserimento dei dati nella tabella 'sx_prenesami'
    // Assicurati di adattare questa query al tuo schema del database
    $sql = "INSERT INTO sx_prenesami (id_esame, matricola, nome, cognome, email, dataora_prenotazione) 
            VALUES (?, ?, ?, ?, ?, ?)";

    // Prepara la query
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Errore nella preparazione della query: " . $conn->error);
    }

    // Associa i parametri
    $stmt->bind_param("isssss", $idEsame, $matricola, $nome, $cognome, $email, $dataora_prenotazione);

    // Esegui la query
    if ($stmt->execute()) {
        // Prenotazione avvenuta con successo
        echo "Prenotazione avvenuta con successo.";
    } else {
        // Errore durante la prenotazione
        echo "Errore durante la prenotazione dell'esame 1: " . $stmt->error;
    }

    // Chiudi la connessione al database se necessario
    // $conn->close();
} else {
    // Richiesta non valida
    echo "Richiesta non valida.";
}
?>
