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

    // Esegui una query per inserire i dati nel tuo database
$sql = "INSERT INTO sx_prenesami (id_esame, nome, cognome, matricola, email, dataora_prenotazione) VALUES (?, ?, ?, ?, ?, NOW())";
$stmt = $conn->prepare($sql);
$stmt->bind_param("issss", $idEsame, $nome, $cognome, $matricola, $email);

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
