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
// Connessione al database
include '../../db_connector.php';

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Verifica se sono stati inviati dati dal modulo
if (isset($_POST['insegnamento']) && isset($_POST['docente']) && isset($_POST['data_esonero']) && isset($_POST['data_iscrizione'])) {
    // Recupera i dati dal modulo
    $insegnamento = $_POST['insegnamento'];
    $docente = $_POST['docente'];
    $data_esonero = $_POST['data_esonero'];
    $data_iscrizione = $_POST['data_iscrizione'];
    $datamessaggio1 = date("d-m-Y", strtotime($data_iscrizione));
    $datamessaggio2 = date("d-m-Y", strtotime($data_esonero));

    // Prepara e esegui una query SQL per inserire i dati nella tabella
    $sql = "INSERT INTO sx_esamidisponibili (insegnamento, docente, data_esonero, data_scadiscrizioni) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $insegnamento, $docente, $data_esonero, $data_iscrizione);

    if ($stmt->execute()) {
        // Inserimento riuscito
        echo "Inserimento avvenuto con successo.";
        require_once '../../vendor/autoload.php';
        $bot = new TelegramBot\Api\BotApi($botToken);
        $message = "*SBOBINAX - Nuovo Esonero:* \nLa prenotazione all'esonero di *$insegnamento* del *$datamessaggio2* è stata aperta. \nLa chiusura delle iscrizioni è fissata alle 23:59 del *$datamessaggio1*.";
        $bot->sendMessage($chatId, $message, 'Markdown');
    } else {
        // Gestione degli errori
        echo "Errore durante l'inserimento: " . $stmt->error;
    }

    // Chiudi la connessione al database
    $stmt->close();
} else {
    // Dati mancanti dal modulo
    echo "Errore: Dati mancanti dal modulo.";
}

// Chiudi la connessione al database
$conn->close();
?>
