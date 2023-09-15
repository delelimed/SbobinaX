<?php
// Avvia la sessione
session_start();

// Verifica se l'utente è autenticato
if (!isset($_SESSION['matricola'])) {
    echo "Utente non autenticato.";
    exit;
}

// Connessione al database
include '../../db_connector.php';

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

if (isset($_POST['idEsame'])) {
    $idEsame = $_POST['idEsame'];
    $matricola = $_SESSION['matricola']; // Matricola dell'utente autenticato

    // Esegui la query per eliminare l'inserimento
    $sql = "DELETE FROM sx_prenesami WHERE id_esame = ? AND matricola = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $idEsame, $matricola);
    if ($stmt->execute()) {
        echo "Eliminazione completata con successo.";
    } else {
        echo "Errore durante l'eliminazione.";
    }

    // Chiudi la connessione al database
    $conn->close();
}
?>
