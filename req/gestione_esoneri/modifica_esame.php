<?php
// Connessione al database
include '../../db_connector.php';

// Verifica se "smtp_attivo" è impostato su "on" nella tabella "sx_settings"
$querySmtpAttivo = "SELECT attuale FROM sx_settings WHERE nome_impostazione = 'smtp_attivo'";
$stmtSmtpAttivo = $conn->prepare($querySmtpAttivo);
if ($stmtSmtpAttivo === false) {
    die("Errore nella preparazione dello statement: " . $conn->error);
}
$stmtSmtpAttivo->execute();
$stmtSmtpAttivo->bind_result($smtpAttivo);
$stmtSmtpAttivo->fetch();
$stmtSmtpAttivo->close();

if ($smtpAttivo === 'on') {
    // SMTP attivo, includi il codice
    $queryConfig = "SELECT nome_impostazione, attuale FROM sx_settings WHERE nome_impostazione IN ('TOKEN', 'ID_GRUPPO')";
    $stmtConfig = $conn->prepare($queryConfig);
    if ($stmtConfig === false) {
        die("Errore nella preparazione dello statement: " . $conn->error);
    }
    $stmtConfig->execute();
    $stmtConfig->bind_result($nomeImpostazione, $valore);
    $configValues = array();
    while ($stmtConfig->fetch()) {
        $configValues[$nomeImpostazione] = $valore;
    }
    $stmtConfig->close();
    $botToken = $configValues['TOKEN'];
    $chatId = $configValues['ID_GRUPPO'];

    // Ora puoi utilizzare $botToken e $chatId
}

// Chiudi la connessione al database
$conn->close();
?>
<?php
if (isset($_POST['idEsame'])) {
    // Connessione al database
    include '../../db_connector.php';

    // Verifica della connessione
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    // Ottieni i dati dalla richiesta POST
    $idEsame = $_POST['idEsame'];
    $insegnamento = $_POST['insegnamento'];
    $docente = $_POST['docente'];
    $dataEsonero = $_POST['dataEsonero'];
    $dataScadiscrizioni = $_POST['dataScadiscrizioni'];
    $datamessaggio1 = date("d-m-Y", strtotime($dataScadiscrizioni));
    $datamessaggio2 = date("d-m-Y", strtotime($dataEsonero));

    // Query per aggiornare i dati dell'esame
    $queryModifica = "UPDATE sx_esamidisponibili SET insegnamento = ?, docente = ?, data_esonero = ?, data_scadiscrizioni = ? WHERE id = ?";
    $stmtModifica = $conn->prepare($queryModifica);
    $stmtModifica->bind_param("ssssi", $insegnamento, $docente, $dataEsonero, $dataScadiscrizioni, $idEsame);

    if ($stmtModifica->execute()) {
        $stmtModifica->close();

        // Chiudi la connessione al database
        $conn->close();

        echo 'success';
        echo "Inserimento avvenuto con successo.";
        require_once '../../vendor/autoload.php';
        $bot = new TelegramBot\Api\BotApi($botToken);
        $message = "*SBOBINAX - Modifica Esonero:* \nL'esonero di *$insegnamento* è stato modificato. Di seguito i nuovi dati: \nData Esonero: *$datamessaggio2*; \nFine iscrizioni: 23:59 del *$datamessaggio1*.";
        $bot->sendMessage($chatId, $message, 'Markdown');
    } else {
        echo 'Errore durante la modifica';
    }
} else {
    echo 'Parametri non impostati correttamente.';
}
?>

