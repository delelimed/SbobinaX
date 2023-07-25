<?php
// Connetti al database (sostituisci con i tuoi dati di connessione)
include "../../db_connector.php";
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Controlla se il form è stato inviato
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ottieni i dati dal form
    $serverSMTP = $_POST["ServerSMTP"];
    $numeroPorta = $_POST["NPorta"];
    $utenteSMTP = $_POST["UtenteSMTP"];
    $passwordSMTP = $_POST["PSSWSMTP"];
    $emailInvio = $_POST["MailSMTP"];
    $switchEmailProva = $_POST["smtp_attivo"] === 'on' ? 'on' : 'off';



    // Cifratura della password
    $hashedPassword = password_hash($passwordSMTP, PASSWORD_BCRYPT);

    // Verifica se i dati esistono nella tabella settings
    $sql_check = "SELECT COUNT(*) AS count FROM settings";
    $result = $conn->query($sql_check);
    $row = $result->fetch_assoc();
    $count = $row["count"];

    if ($count > 0) {
        // I dati esistono, quindi esegui l'aggiornamento
        $sql_update = "UPDATE settings SET
            attuale = CASE
                WHEN nome_impostazione = 'ServerSMTP' THEN '$serverSMTP'
                WHEN nome_impostazione = 'NPorta' THEN '$numeroPorta'
                WHEN nome_impostazione = 'UtenteSMTP' THEN '$utenteSMTP'
                WHEN nome_impostazione = 'PSSWSMTP' THEN '$hashedPassword'
                WHEN nome_impostazione = 'MailSMTP' THEN '$emailInvio'
                WHEN nome_impostazione = 'smtp_attivo' THEN '$switchEmailProva'
            END
            WHERE nome_impostazione IN ('ServerSMTP', 'NPorta', 'UtenteSMTP', 'PSSWSMTP', 'MailSMTP', 'smtp_attivo')";

        if ($conn->query($sql_update) === TRUE) {
            echo "Dati aggiornati con successo!";
        }
    }
}

// Chiudi la connessione al database
$conn->close();
?>

