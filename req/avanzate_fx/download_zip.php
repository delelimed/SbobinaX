<?php
// Connessione al database (sostituisci con i tuoi dati di connessione)
include '../../db_connector.php';

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Query per recuperare i dati dalla tabella sbobine_calendarizzate
$sql = "SELECT id, insegnamento, posizione_server FROM sx_sbobine_calendarizzate";
$result = $conn->query($sql);

// Controllo se ci sono risultati
if ($result->num_rows > 0) {
    // Creazione delle cartelle per gli insegnamenti
    $baseFolder = "../../sbobine/"; // Imposta il nome della cartella principale dove saranno contenute le cartelle degli insegnamenti
    if (!file_exists($baseFolder)) {
        mkdir($baseFolder);
    }

    while ($row = $result->fetch_assoc()) {
        $insegnamento = $row["insegnamento"];
        $insegnamentoFolder = $baseFolder . '/' . $insegnamento;

        // Crea la cartella per l'insegnamento se non esiste
        if (!file_exists($insegnamentoFolder)) {
            mkdir($insegnamentoFolder);
        }

        // Copia il file nella cartella corrispondente
        $fileToCopy = $row["posizione_server"];
        copy($fileToCopy, $insegnamentoFolder . '/' . basename($fileToCopy));
    }

    // Chiusura della connessione al database
    $conn->close();

    // Creazione dell'archivio ZIP
    $zipFileName = 'archivio_sbobine.zip';
    $zip = new ZipArchive();
    if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
        // Aggiungi tutte le cartelle degli insegnamenti all'archivio ZIP
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($baseFolder),
            RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file) {
            if (!$file->isDir()) {
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($baseFolder) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }

        $zip->close();

        // Specifica l'header per il download del file ZIP
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="' . basename($zipFileName) . '"');
        header('Content-Length: ' . filesize($zipFileName));

        // Invia il file ZIP al browser
        readfile($zipFileName);

        // Elimina il file ZIP temporaneo
        unlink($zipFileName);

        // Elimina le cartelle degli insegnamenti e i file temporanei
        removeDirectory($baseFolder);

        exit;
    } else {
        echo 'Si è verificato un errore durante la creazione dell\'archivio ZIP.';
    }
} else {
    echo "Nessun dato trovato nella tabella sbobine_calendarizzate.";
    $conn->close();
    exit;
}

// Funzione ricorsiva per eliminare una cartella e i suoi contenuti
function removeDirectory($dir) {
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (is_dir($dir . "/" . $object))
                    removeDirectory($dir . "/" . $object);
                else
                    unlink($dir . "/" . $object);
            }
        }
        rmdir($dir);
    }
}
?>
