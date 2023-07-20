<?php
// Connessione al database (Assumi che $conn sia già configurata)
include "../db_connector.php";

// Controlla se è stata inviata una richiesta POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recupera i dati inviati dal form
    $data_lezione = $_POST['data_lezione'];
    $id_insegnamento = $_POST['insegnamento'];
    $argomento_lezione = $_POST['argomento'];

    // Controlla se è stato caricato un file
    if ($_FILES['file_sbobina']['error'] === UPLOAD_ERR_OK) {
        // Percorso in cui salvare il file
        $target_dir = "sbobine/";
        $target_file = $target_dir . basename($_FILES['file_sbobina']['name']);

        // Verifica l'estensione del file (assicurarsi che il file sia un PDF)
        $file_ext = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if ($file_ext !== "pdf") {
            echo "Errore: Il file deve essere in formato PDF.";
            exit;
        }

        // Sposta il file nella cartella di destinazione
        if (move_uploaded_file($_FILES['file_sbobina']['tmp_name'], $target_file)) {
            // Inserisci i dati nella tabella "sbobine"
            $sql = "INSERT INTO sbobine (data_lezione, id_insegnamento, percorso_sbobina, argomento_lezione)
                    VALUES ('$data_lezione', '$id_insegnamento', '$target_file', '$argomento_lezione')";

            if ($conn->query($sql) === TRUE) {
                // Recupera l'ID dell'ultima sbobina inserita
                $last_sbobina_id = $conn->insert_id;

                // Recupera gli sbobinatori selezionati dal form
                if (isset($_POST['sbobinatori'])) {
                    $sbobinatori = $_POST['sbobinatori'];
                    foreach ($sbobinatori as $sbobinatore_id) {
                        // Inserisci l'associazione tra sbobinatore e sbobina nella tabella pivot
                        $sql_sbobinatore = "INSERT INTO sbobinatore_revisionatore (id_sbobinatore, id_sbobina)
                                           VALUES ('$sbobinatore_id', '$last_sbobina_id')";
                        $conn->query($sql_sbobinatore);
                    }
                }

                // Recupera i revisori selezionati dal form
                if (isset($_POST['revisori'])) {
                    $revisori = $_POST['revisori'];
                    foreach ($revisori as $revisore_id) {
                        // Inserisci l'associazione tra revisore e sbobina nella tabella pivot
                        $sql_revisore = "INSERT INTO sbobinatore_revisionatore (id_revisionatore, id_sbobina)
                                         VALUES ('$revisore_id', '$last_sbobina_id')";
                        $conn->query($sql_revisore);
                    }
                }

                echo "Sbobina caricata con successo!";
            } else {
                echo "Errore durante l'inserimento della sbobina nel database: " . $conn->error;
            }
        } else {
            echo "Errore durante l'upload del file.";
        }
    } else {
        echo "Errore durante l'upload del file: " . $_FILES['file_sbobina']['error'];
    }
} else {
    echo "Metodo non consentito.";
}
?>
