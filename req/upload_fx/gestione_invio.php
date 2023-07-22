<?php
// Connessione al database e altre configurazioni
include "../../db_connector.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ottieni i dati dal modulo
    $idSbobina = $_POST['id_sbobina'];
    $idInsegnamento = $_POST['insegnamento'];
    $argomento = $_POST['argomento'];
    $dataLezione = $_POST['data_lezione'];
    $caricata = '1';
    date_default_timezone_set('Europe/Rome');
    $oggi = new DateTime();
    $dataOggi = $oggi->format('Y-m-d');


    // Esegui la query per aggiornare il record nella tabella sbobine_calendarizzate
    $query = "UPDATE sbobine_calendarizzate SET insegnamento = '$idInsegnamento', argomento = '$argomento',  data_caricamento = $dataOggi , caricata = '$caricata', data_lezione = '$dataLezione' WHERE id = '$idSbobina'";

    // Esegui la query tramite $conn, che rappresenta la tua connessione al database
    $result = $conn->query($query);

    if ($result) {
        // Query eseguita con successo, gestisci il caricamento del file (posizione server)
        // Assicurati di avere già caricato il file nella posizione desiderata
        // $filePosizione = ...; // La posizione del file all'interno del server dopo il caricamento

        // Aggiorna il record con la posizione del file
        $query = "UPDATE sbobine_calendarizzate SET posizione_server = '$filePosizione' WHERE id = '$idSbobina'";
        $result = $conn->query($query);

        if ($result) {
            // Tutto è andato a buon fine, fai quello che serve (ad es. mostrare un messaggio di successo)
            echo "Invio completato con successo!";
        } else {
            // Gestisci l'errore in caso di fallimento dell'aggiornamento della posizione del file
            echo "Errore nell'aggiornamento della posizione del file: " . $conn->error;
        }
    } else {
        // Gestisci l'errore in caso di fallimento dell'aggiornamento dei dati nel database
        echo "Errore nell'aggiornamento dei dati: " . $conn->error;
    }
}
?>

