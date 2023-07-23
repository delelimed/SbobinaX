<?php
// Esegui la verifica dei permessi qui utilizzando il parametro "id_sbobina" per identificare la sbobina
// Ad esempio, controlla se l'utente loggato è associato alla sbobina con questo ID
include "../../db_connector.php";
$idSbobina = $_GET['id_sbobina'];
$idPartecipazione = $_GET['insegnamento'];
session_start();

// Esempio di verifica dei permessi: controlla se l'utente loggato ha partecipato alla sbobina con questo ID
$currentUserId = $_SESSION['id']; // Sostituisci con il tuo modo per ottenere l'ID dell'utente loggato
$queryPartecipazione = "SELECT * FROM partecipazione_sbobine 
                        WHERE id_user = $currentUserId AND id_insegnamento = $idSbobina";
$resultPartecipazione = $conn->query($queryPartecipazione);
$utenteAutorizzato = $resultPartecipazione->num_rows > 0;

// Se l'utente è autorizzato, fornisci il download del file
if ($utenteAutorizzato) {
    // Ottieni il percorso del file dal database in base all'ID della sbobina
    // Sostituisci questa parte con il codice per ottenere il percorso del file dal database
    $queryFile = "SELECT posizione_server FROM sbobine_calendarizzate WHERE id = $idSbobina";
    $resultFile = $conn->query($queryFile);

    if ($resultFile->num_rows > 0) {
        $rowFile = $resultFile->fetch_assoc();
        $percorsoFile = $rowFile['posizione_server'];
        $nomeFile = basename($percorsoFile); // Ottieni solo il nome del file da tutto il percorso

        // Fornisci il download del file con il nome corretto
        header("Content-Disposition: attachment; filename=\"$nomeFile\"");
        readfile($percorsoFile);
        exit;
    } else {
        // Se il file non è stato trovato nel database, mostra un messaggio di errore o reindirizza l'utente
        echo "File non trovato.";
    }
} else {
    // Se l'utente non è autorizzato, mostra un messaggio di errore o reindirizza l'utente
    echo "Non sei autorizzato a scaricare questo file.";
}
?>
