<?php
// Connessione al database e altre configurazioni
include "../../db_connector.php";

// Set the default value of $filePosizione to an empty string
$filePosizione = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ottieni i dati dal modulo
    $idSbobina = $_POST['id_sbobina'];
    $idInsegnamento = $_POST['insegnamento'];
    $argomento = $_POST['argomento'];
    error_log("argomento: " . $argomento);
    $dataLezione = $_POST['data_lezione'];
    $caricata = '1';
    date_default_timezone_set('Europe/Rome');
    $oggi = new DateTime();
    $dataOggi = $oggi->format('Y-m-d');

    // Fetch "progressivo_insegnamento" from the database
    $query = "SELECT progressivo_insegnamento, caricata FROM sx_sbobine_calendarizzate WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $idSbobina);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        // The query returned results, proceed with fetching the data
        $row = $result->fetch_assoc();
        $progressivoInsegnamento = $row['progressivo_insegnamento'];
        $caricata = $row['caricata'];

        if ($caricata == 1) {
            echo "<script>alert('Il file è già stato caricato e non è possibile effettuare ulteriori upload.'); window.location.href = '../../templates/home.php';</script>";
            exit(); // Stop the execution here
        }

        // Generate the new filename using "progressivo_insegnamento", "argomento", and ".pdf" extension
        $nuovoNomeFile = $progressivoInsegnamento . "." . $argomento . ".pdf";

        // Crea il percorso di destinazione in cui salvare il file
        $cartellaDestinazione = "../../sbobine";
        $percorsoDestinazione = $cartellaDestinazione . "/" . $nuovoNomeFile;

        // Retrieve the temporary path of the uploaded file on the server
        $percorsoTemporaneoFile = $_FILES['file_sbobina']['tmp_name'];

        // Sposta il file temporaneo nella cartella di destinazione
        if (move_uploaded_file($percorsoTemporaneoFile, $percorsoDestinazione)) {
            // Aggiorna il record con la posizione del file nel database
            $filePosizione = $percorsoDestinazione; // Assign the path to the uploaded file to $filePosizione
            $idSbobina = $_POST['id_sbobina']; // Retrieve the value of "id_sbobina" from the form

            $query = "UPDATE sx_sbobine_calendarizzate SET posizione_server = ?, caricata = '1', argomento = ? WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssi", $filePosizione, $argomento, $idSbobina);
            if ($stmt->execute()) {
                // Tutto è andato a buon fine, mostra un messaggio di successo e reindirizza alla pagina di upload
                echo "<script>alert('Invio completato con successo!'); window.location.href = '../../templates/home.php';</script>";
            } else {
                // Gestisci l'errore in caso di fallimento dell'aggiornamento della posizione del file
                echo "<script>alert('Errore nell\'aggiornamento della posizione del file: " . $stmt->error . "'); window.location.href = '../../templates/home.php';</script>";
            }
        } else {
            // Handle the case when the file move fails
            echo "<script>alert('Errore nel caricamento del file nella cartella di destinazione.');</script>";
            exit(); // Stop the execution here
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


