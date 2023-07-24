<?php
// Percorso della cartella contenente i file PDF
$cartella = '../../sbobine/';

// Funzione per ottenere l'estensione di un file
function getFileExtension($filename) {
    return pathinfo($filename, PATHINFO_EXTENSION);
}

// Recupera l'elenco dei file PDF presenti nella cartella
$files = glob($cartella . '*.pdf');

// Controllo se ci sono file PDF presenti nella cartella
if (count($files) > 0) {
    // Specifica l'header per il download del file
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($files[0]) . '"');
    header('Content-Length: ' . filesize($files[0]));

    // Leggi il file e invialo al browser
    readfile($files[0]);
} else {
    echo "Nessun file PDF presente nella cartella.";
}
?>

