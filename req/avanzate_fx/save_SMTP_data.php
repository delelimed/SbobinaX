<?php
// Connetti al database (sostituisci con i tuoi dati di connessione)
include "../../db_connector.php";
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Controlla se il form è stato inviato
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ottieni i dati dal form
    $TOKEN = $_POST["TOKEN"];
    $ID_GRUPPO = $_POST["ID_GRUPPO"];
    $switchEmailProva = $_POST["smtp_attivo"] === 'on' ? 'on' : 'off';

    // Verifica se i dati esistono nella tabella settings
    $sql_check = "SELECT COUNT(*) AS count FROM sx_settings";
    $result = $conn->query($sql_check);
    $row = $result->fetch_assoc();
    $count = $row["count"];

    if ($count > 0) {
        // I dati esistono, quindi esegui l'aggiornamento
        $sql_update = "UPDATE sx_settings SET
            attuale = CASE
                WHEN nome_impostazione = 'TOKEN' THEN '$TOKEN'
                WHEN nome_impostazione = 'ID_GRUPPO' THEN '$ID_GRUPPO'
                WHEN nome_impostazione = 'smtp_attivo' THEN '$switchEmailProva'
            END
            WHERE nome_impostazione IN ('TOKEN', 'ID_GRUPPO', 'smtp_attivo')";

        if ($conn->query($sql_update) === TRUE) {
            echo "Dati aggiornati con successo!";
        }
    }
}

// Chiudi la connessione al database
$conn->close();
?>

