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
// Connessione al database e altre configurazioni
include "../../db_connector.php";
require_once '../../vendor/autoload.php';

// Set the default value of $filePosizione to an empty string
$filePosizione = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ottieni i dati dal modulo
    $idSbobina = $_POST['id_sbobina'];
    $idInsegnamento = $_POST['insegnamento'];
    $argomento = $_POST['argomento'];
    $sender = $_POST['sender'];
    error_log("argomento: " . $argomento);
    $dataLezione = $_POST['data_lezione'];
    $datamessaggio = date("d-m-Y", strtotime($dataLezione));
    $caricata = '1';
    date_default_timezone_set('Europe/Rome');
    $oggi = new DateTime();
    $dataOggi = $oggi->format('Y-m-d H:i:s'); // Formato data e ora: "YYYY-MM-DD HH:MM:SS"

    // Genera una chiave segreta casuale di 150 caratteri
    $chiaveSegreta = bin2hex(random_bytes(120)); // 1 byte = 2 caratteri esadecimali

    $conn = mysqli_connect($sName, $uName, $pass, $db_name);
    $query = "SELECT progressivo_insegnamento, caricata FROM sx_sbobine_calendarizzate WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $idSbobina);
    $stmt->execute();
    $result = $stmt->get_result();

    $query1 = "SELECT materia FROM sx_insegnamenti WHERE id = ?";
    $stmt1 = $conn->prepare($query1);

    $stmt1->bind_param("i", $idInsegnamento);

    if ($stmt1->execute() === false) {
        die("Errore nell'esecuzione dello statement: " . $stmt1->error);
    }

    $stmt1->bind_result($materia);

    if ($stmt1->fetch()) {
        echo "Materia: " . $materia;
    } else {
        echo "Nessun risultato trovato.";
    }
    $stmt1->close();


    if ($result && $result->num_rows > 0) {
        // The query returned results, proceed with fetching the data
        $row = $result->fetch_assoc();
        $progressivoInsegnamento = $row['progressivo_insegnamento'];
        $caricata = $row['caricata'];

        if ($caricata == 1) {
            echo "<script>alert('Il file è già stato caricato e non è possibile effettuare ulteriori upload.'); window.location.href = '../../templates/home.php';</script>";
            exit(); // Stop the execution here
        }

        // Generate the new filename using "progressivo_insegnamento", "argomento", and ".PDFCRYPT" extension
        $nuovoNomeFile = $progressivoInsegnamento . "." . $argomento . ".SBOBI";

        // Crea il percorso di destinazione in cui salvare il file
        $cartellaDestinazione = "../../sbobine";
        $percorsoDestinazione = $cartellaDestinazione . "/" . $nuovoNomeFile;

        // Retrieve the temporary path of the uploaded file on the server
        $percorsoTemporaneoFile = $_FILES['file_sbobina']['tmp_name'];

        // Cifra il contenuto del file con la chiave segreta
        $contenuto = file_get_contents($percorsoTemporaneoFile);
        $contenutoCifrato = openssl_encrypt($contenuto, 'aes-256-cbc', $chiaveSegreta, 0, $iv);

        // Scrivi il contenuto cifrato nel nuovo file
        file_put_contents($percorsoDestinazione, $contenutoCifrato);

        // Aggiorna il record con la posizione del file nel database
        $filePosizione = $percorsoDestinazione; // Assign the path to the uploaded file to $filePosizione
        $idSbobina = $_POST['id_sbobina']; // Retrieve the value of "id_sbobina" from the form

        $query = "UPDATE sx_sbobine_calendarizzate SET posizione_server = ?, caricata = '1', revisione = '1', argomento = ?, auth_token = ?, data_caricamento = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssi", $filePosizione, $argomento, $chiaveSegreta, $dataOggi, $idSbobina);
        if ($stmt->execute()) {
            // Tutto è andato a buon fine, mostra un messaggio di successo e reindirizza alla pagina di upload
            echo "<script>alert('Invio completato con successo!'); window.location.href = '../../templates/home.php';</script>";
            $bot = new TelegramBot\Api\BotApi($botToken);
            $message = "*SBOBINAX - Upload:* \nLo sbobinatore *$sender* ha appena caricato la sbobina del *$datamessaggio* per l'insegnamento *'$materia'*.\nL'argomento della lezione era: *'$argomento'*.\nE' ora visibile da tutti gli sbobinatori.";
            $response = $bot->sendMessage($chatId, $message, 'Markdown');

        } else {
            // Gestisci l'errore in caso di fallimento dell'aggiornamento della posizione del file
            echo "<script>alert('Errore nell\'aggiornamento della posizione del file: " . $stmt->error . "'); window.location.href = '../../templates/home.php';</script>";
        }
    } else {
        // Handle the case when the record is not found in the database
        echo "<script>alert('Record not found in the database.'); window.location.href = '../../templates/home.php';</script>";
        exit(); // Stop the execution here
    }

    // Chiudi il prepared statement
    $stmt->close();
}
?>


