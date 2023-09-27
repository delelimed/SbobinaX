<?php
// Connessione al database

?>
<?php
// Includi il file per la connessione al database
include "../../db_connector.php";

// Inizia la sessione
session_start();

// Funzione per verificare se l'utente è autorizzato a scaricare la sbobina
function is_user_authorized_to_download_sbobina($user_id, $sbobina_id, $conn)
{
    // Ottieni l'id_insegnamento della sbobina dalla tabella sbobine_calendarizzate
    $sql_sbobina = "SELECT insegnamento FROM sx_sbobine_calendarizzate WHERE id = ?";
    $stmt_sbobina = $conn->prepare($sql_sbobina);
    $stmt_sbobina->bind_param("i", $sbobina_id);
    $stmt_sbobina->execute();
    $result_sbobina = $stmt_sbobina->get_result();
    $row_sbobina = $result_sbobina->fetch_assoc();
    $id_insegnamento_sbobina = $row_sbobina['insegnamento'];

    // Esegui la query parametrica per verificare se l'utente partecipa alle sbobine di quella materia
    $sql_partecipazione = "SELECT * FROM sx_partecipazione_sbobine WHERE id_user = ? AND id_insegnamento = ?";
    $stmt_partecipazione = $conn->prepare($sql_partecipazione);
    $stmt_partecipazione->bind_param("ii", $user_id, $id_insegnamento_sbobina);
    $stmt_partecipazione->execute();
    $result_partecipazione = $stmt_partecipazione->get_result();

    if ($result_partecipazione->num_rows > 0) {
        // L'utente partecipa alle sbobine di quella materia
        return true;
    } else {
        // L'utente non partecipa alle sbobine di quella materia
        return false;
    }
}

// Funzione per ottenere il percorso del file dalla tabella "sbobine_calendarizzate" nel database
function get_file_path_from_database($sbobina_id, $conn)
{
    // Esegui la query parametrica per ottenere il percorso del file
    $sql = "SELECT posizione_server FROM sx_sbobine_calendarizzate WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $sbobina_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $file_path = $row['posizione_server'];
        return $file_path;
    } else {
        return null; // File non trovato
    }
}

// Funzione per ottenere l'auth_token dal database
function get_auth_token_from_database($sbobina_id, $conn) {
    // Esegui una query per ottenere l'auth_token dal database utilizzando $sbobina_id
    // Restituisci l'auth_token o false in caso di errore
    $query = "SELECT auth_token FROM sx_sbobine_calendarizzate WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $sbobina_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        return $row['auth_token'];
    } else {
        return false;
    }
}

// Define the function to approve the sbobina in the database
function approve_sbobina_in_database($sbobina_id, $conn) {
    $sessionId = $_SESSION['id'];

    // Prepare the SQL query to update the sbobina status
    $sql = "UPDATE sx_revisori_sbobine SET esito = '1' WHERE id_sbobina = ? AND id_revisore = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $sbobina_id, $sessionId);

    if ($stmt->execute()) {
        // Check if all entries for the sbobina in revisori_sbobine have esito=1
        $check_sql = "SELECT COUNT(*) AS num_entries FROM sx_revisori_sbobine WHERE id_sbobina = ? AND esito = '1'";
        $stmt_check = $conn->prepare($check_sql);
        $stmt_check->bind_param("i", $sbobina_id);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();
        $row = $result_check->fetch_assoc();
        $num_entries = $row['num_entries'];

        // Get the total number of revisori_sbobine entries for the sbobina
        $total_entries_sql = "SELECT COUNT(*) AS total_entries FROM sx_revisori_sbobine WHERE id_sbobina = ?";
        $stmt_total_entries = $conn->prepare($total_entries_sql);
        $stmt_total_entries->bind_param("i", $sbobina_id);
        $stmt_total_entries->execute();
        $total_row = $stmt_total_entries->get_result()->fetch_assoc();
        $total_entries = $total_row['total_entries'];


        if ($num_entries === $total_entries) {
            // Update the revisione field in sbobine_calendarizzate to 1 for the corresponding sbobina_id
            $update_revisione_sql = "UPDATE sx_sbobine_calendarizzate SET revisione = '1' WHERE id = ?";
            $stmt_update_revisione = $conn->prepare($update_revisione_sql);
            $stmt_update_revisione->bind_param("i", $sbobina_id);
            $stmt_update_revisione->execute();

            $query1 = "SELECT insegnamento, argomento, data_lezione FROM sx_sbobine_calendarizzate WHERE id = ?";
            $stmt1 = $conn->prepare($query1);

            if ($stmt1 === false) {
                die("Errore nella preparazione dello statement: " . $conn->error);
            }
            $stmt1->bind_param("i", $sbobina_id);
            if ($stmt1->execute() === false) {
                die("Errore nell'esecuzione dello statement: " . $stmt1->error);
            }
            $stmt1->bind_result($insegnamento, $argomento, $data_lezione);
            $stmt1->fetch();
            $stmt1->close();
            $datamessaggio = date("d-m-Y", strtotime($data_lezione));

            $query2 = "SELECT materia FROM sx_insegnamenti WHERE id = ?";
            $stmt2 = $conn->prepare($query2);
            if ($stmt2 === false) {
                die("Errore nella preparazione dello statement: " . $conn->error);
            }
            $stmt2->bind_param("i", $insegnamento);
            if ($stmt2->execute() === false) {
                die("Errore nell'esecuzione dello statement: " . $stmt2->error);
            }
            $stmt2->bind_result($materia);
            $stmt2->fetch();
            $stmt2->close();
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

            require_once '../../vendor/autoload.php';
            $bot = new TelegramBot\Api\BotApi($botToken);
            $message = "*SBOBINAX - Approvazione:* \nLa sbobina di *$materia* del *$datamessaggio*, con argomento *$argomento*  è stata approvata da tutti i revisori. \nE' ora visibile a tutti gli sbobinatori abilitati.";
            $bot->sendMessage($chatId, $message, 'Markdown');
        }

        return true; // Approval successful
    } else {
        return false; // Approval failed
    }
}

// Controlla se è stata richiesta l'azione di download
if (isset($_GET['download_sbobina'])) {
    // Include il file di configurazione del database
    include "../../db_connector.php";

    // Funzione per cambiare l'estensione di un file
    function change_file_extension($file_path, $new_extension) {
        $info = pathinfo($file_path);
        return $info['dirname'] . '/' . $info['filename'] . '.' . $new_extension;
    }

    $sbobina_id = $_GET['download_sbobina'];

    // Controlla se l'utente è autorizzato a scaricare la sbobina
    if (is_user_authorized_to_download_sbobina($_SESSION['id'], $sbobina_id, $conn)) {
        // Ottieni il percorso del file cifrato dal database
        $file_path = get_file_path_from_database($sbobina_id, $conn);

        if ($file_path) {
            // Leggi il contenuto cifrato del file
            $file_content = file_get_contents($file_path);

            // Decifra il contenuto utilizzando la chiave "auth_token" dal database
            $auth_token = get_auth_token_from_database($sbobina_id, $conn);

            if ($auth_token) {
                $file_content_decrypted = openssl_decrypt($file_content, 'aes-256-cbc', $auth_token, 0);

                if ($file_content_decrypted !== false) {
                    // Cambia l'estensione del file in ".pdf"
                    $pdf_file_path = change_file_extension($file_path, 'pdf');

                    // Scrivi il contenuto decifrato in un nuovo file PDF
                    file_put_contents($pdf_file_path, $file_content_decrypted);

                    // Imposta gli header per il download del file PDF
                    header("Content-Type: application/pdf");
                    header("Content-Disposition: attachment; filename=\"" . basename($pdf_file_path) . "\"");
                    header("Content-Length: " . filesize($pdf_file_path));

                    // Leggi e restituisci il file PDF al browser
                    readfile($pdf_file_path);

                    // Rimuovi il file PDF temporaneo
                    unlink($pdf_file_path);

                    exit;
                } else {
                    // Gestisci il caso in cui la decifrazione fallisce
                    echo "Errore nella decifrazione del file.";
                    exit;
                }
            } else {
                // Gestisci il caso in cui l'auth_token non sia stato trovato nel database
                echo "Chiave di autenticazione non valida.";
                exit;
            }
        } else {
            // Gestisci il caso in cui il file cifrato non sia stato trovato o altre eccezioni
            // Potresti mostrare un messaggio di errore o reindirizzarlo a una pagina di errore
            echo "File cifrato non trovato.";
            exit;
        }
    } else {
        // L'utente non è autorizzato a scaricare la sbobina, mostra un messaggio di accesso negato o reindirizzalo a una pagina appropriata
        echo "Accesso negato: non sei autorizzato al download di questa sbobina.";
        exit;
    }
}

// Controlla se è stata richiesta l'azione di approvazione
if (isset($_GET['approva_sbobina'])) {
    $sbobina_id = $_GET['approva_sbobina'];

    // Esegui il codice per approvare la sbobina con l'ID specificato
    if (approve_sbobina_in_database($sbobina_id, $conn)) {
        // Invia una risposta di successo
        $response = array('success' => true, 'message' => 'Sbobina approvata con successo!');
    } else {
        // Invia una risposta di errore
        $response = array('success' => false, 'message' => 'Errore durante l\'approvazione della sbobina.');
    }

    // Converti l'array di risposta in formato JSON
    echo json_encode($response);
    exit;
}
?>
