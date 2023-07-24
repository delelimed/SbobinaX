<?php
// Percorso della cartella in cui sono presenti i file PDF
$cartella = '../../sbobine/';

// Recupera l'elenco dei file PDF presenti nella cartella
$pdfFiles = glob($cartella . '*.pdf');

// Loop attraverso l'elenco dei file PDF e cancellali uno per uno
foreach ($pdfFiles as $pdfFile) {
    if (is_file($pdfFile)) {
        unlink($pdfFile); // Cancella il file
        echo "File PDF cancellato: " . $pdfFile . "<br>";
    }
}
?>
