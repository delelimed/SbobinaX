<?php
// Esegui la verifica dei permessi qui utilizzando il parametro "id_sbobina" per identificare la sbobina
// Ad esempio, controlla se l'utente loggato è associato alla sbobina con questo ID
include "../../db_connector.php";
$idSbobina = $_GET['id_sbobina'];
$idPartecipazione = $_GET['insegnamento'];
session_start();

// Esempio di verifica dei permessi: controlla se l'utente loggato ha partecipato alla sbobina con questo ID
$currentUserId = $_SESSION['id']; // Sostituisci con il tuo modo per ottenere l'ID dell'utente loggato
$queryPartecipazione = "SELECT * FROM sx_partecipazione_sbobine 
                        WHERE id_user = $currentUserId AND id_insegnamento = $idPartecipazione";
$resultPartecipazione = $conn->query($queryPartecipazione);
$utenteAutorizzato = $resultPartecipazione->num_rows > 0;

// Se l'utente è autorizzato, fornisci il download del file
// ...
if ($utenteAutorizzato) {
    // Ottieni il percorso del file dal database in base all'ID della sbobina
    // Sostituisci questa parte con il codice per ottenere il percorso del file e il valore di "revisione" dal database
    $queryFile = "SELECT posizione_server, revisione FROM sx_sbobine_calendarizzate WHERE id = $idSbobina";
    $resultFile = $conn->query($queryFile);

    if ($resultFile->num_rows > 0) {
        $rowFile = $resultFile->fetch_assoc();
        $percorsoFile = $rowFile['posizione_server'];
        $revisione = $rowFile['revisione'];

        // Verifica se la revisione è uguale a 1 per permettere il download del file
        if ($revisione == 1) {
            $nomeFile = basename($percorsoFile); // Ottieni solo il nome del file da tutto il percorso

            // Fornisci il download del file con il nome corretto
            header("Content-Disposition: attachment; filename=\"$nomeFile\"");
            readfile($percorsoFile);
            exit;
        } else {
            // Se il valore della revisione non è uguale a 1, invia una risposta JSON con il messaggio di errore
            $response = array(
                "authorized" => false,
                "message" => "Non sei autorizzato a scaricare questo file perché la revisione non è approvata."
            );
            echo json_encode($response);
        }
    } else {
        // Se il file non è stato trovato nel database, invia una risposta JSON con il messaggio di errore
        $response = array(
            "authorized" => false,
            "message" => "File non trovato."
        );
        echo json_encode($response);
    }
} else {
    // Se l'utente non è autorizzato, invia una risposta JSON con il messaggio di errore
    $response = array(
        "authorized" => false,
        "message" => "Non sei autorizzato a scaricare questo file."
    );
    echo json_encode($response);
}
?>
