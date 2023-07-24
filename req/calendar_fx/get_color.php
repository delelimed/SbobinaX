<?php
// Connettiti al tuo database MySQL (modifica le credenziali con quelle del tuo database)
include "../../db_connector.php";

// Controlla la connessione
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Query per selezionare gli eventi dalla tabella, includendo l'id della sbobina, 'caricata' e 'revisionata'
$sql = "SELECT sbobine_calendarizzate.id AS id_sbobina, 
        sbobine_calendarizzate.caricata, sbobine_calendarizzate.revisione
        FROM sbobine_calendarizzate";

$result = $conn->query($sql);

$colors = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id_sbobina = $row["id_sbobina"];
        $caricata = intval($row["caricata"]); // Converti il valore in un numero intero (0 o 1)
        $revisionata = intval($row["revisione"]);

        $color = '';
        if ($caricata === 0 && $revisionata === 0) {
            $color = 'red'; // Colore rosso per gli eventi "Da Caricare"
        } else if ($caricata === 1 && $revisionata === 0) {
            $color = 'orange'; // Colore arancio per gli eventi "Da Revisionare"
        } else if ($caricata === 1 && $revisionata === 1) {
            $color = 'green'; // Colore verde per gli eventi "Disponibile"
        } else {
            $color = 'gray'; // Colore grigio per gli eventi con stati non definiti
        }

        // Salva l'id della sbobina e il colore corrispondente nell'array $colors
        $colors[$id_sbobina] = $color;
    }
}

// Chiudi la connessione al database
$conn->close();

// Imposta l'header per consentire al JavaScript di accedere ai dati
header('Access-Control-Allow-Origin: *');

// Restituisci i colori in formato JSON
header("Content-Type: application/json");
echo json_encode($colors);
?>
