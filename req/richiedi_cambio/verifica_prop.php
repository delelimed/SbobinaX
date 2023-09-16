<?php
// Connessione al database
include '../../db_connector.php';

// Ottieni i valori degli input
$inputIDpartenza = $_GET["inputIDpartenza"];
$inputIDarrivo = $_GET["inputIDarrivo"];

// Esegui la query per ottenere i dati dalla tabella
$query = "SELECT * FROM sx_sbobine_calendarizzate WHERE id = ? OR id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $inputIDpartenza, $inputIDarrivo);
$stmt->execute();
$result = $stmt->get_result();

// Inizializza una variabile per tenere traccia dei test
$testPassed = true;

// Verifica se i valori sono uguali nella colonna "insegnamento"
if ($result->num_rows == 2) {
    $row1 = $result->fetch_assoc();
    $row2 = $result->fetch_assoc();

    // Verifica che "caricata" e "revisione" siano entrambi uguali a 0 per entrambe le sbobine
    if (!($row1["caricata"] == 0 && $row1["revisione"] == 0 && $row2["caricata"] == 0 && $row2["revisione"] == 0)) {
        $testPassed = false;
    }

    // Verifica se i valori nella colonna "insegnamento" sono uguali
    if ($row1["insegnamento"] != $row2["insegnamento"]) {
        $testPassed = false;
    }
} else {
    $testPassed = false;
}

// Chiudi la connessione al database
$stmt->close();
$conn->close();

// Restituisci la risposta come JSON
header("Content-Type: application/json");

if ($testPassed) {
    $response = array("ok" => true);
} else {
    $response = array("ok" => false, "error" => "ERROR");
}

echo json_encode($response);
?>

