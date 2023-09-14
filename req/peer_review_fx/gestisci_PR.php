<?php
// gestisci_PR.php

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
        }

        return true; // Approval successful
    } else {
        return false; // Approval failed
    }
}

// Controlla se è stata richiesta l'azione di download
if (isset($_GET['download_sbobina'])) {
    $sbobina_id = $_GET['download_sbobina'];

    // Controlla se l'utente è autorizzato a scaricare la sbobina
    if (is_user_authorized_to_download_sbobina($_SESSION['id'], $sbobina_id, $conn)) {
        // Esegui il codice per scaricare la sbobina dal server
        // Assicurati di sostituire il percorso corretto in base al tuo progetto
        $file_path = get_file_path_from_database($sbobina_id, $conn);
        if ($file_path) {
            header("Content-Type: application/octet-stream");
            header("Content-Transfer-Encoding: Binary");
            header("Content-Disposition: attachment; filename=\"" . basename($file_path) . "\"");
            readfile($file_path);
            exit;
        } else {
            // Gestisci il caso in cui il file non sia stato trovato o altre eccezioni
            // Potresti mostrare un messaggio di errore o reindirizzarlo a una pagina di errore
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


