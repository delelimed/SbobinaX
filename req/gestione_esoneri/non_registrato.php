<?php
// Connessione al database (assicurati di includere il tuo file di connessione qui)
include '../../db_connector.php';

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Raccogli i dati dalla richiesta POST
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$matricola = $_POST['matricola'];
$email = $_POST['email'];
$idEsame = $_POST['idEsame'];

// Esegui una query per inserire i dati nel tuo database
$sql = "INSERT INTO sx_prenesami (id_esame, nome, cognome, matricola, email, dataora_prenotazione) VALUES (?, ?, ?, ?, ?, NOW())";
$stmt = $conn->prepare($sql);
$stmt->bind_param("issss", $idEsame, $nome, $cognome, $matricola, $email);

if ($stmt->execute()) {
    // Restituisci una risposta di successo al client
    echo 'success';
} else {
    // Restituisci una risposta di errore al client
    echo 'error';
}

// Chiudi la connessione al database
$stmt->close();
$conn->close();
?>

