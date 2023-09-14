<?php
session_start();
$sbobinaId = $_POST['sbobinaId'];
$revisoreId = $_SESSION['id'];

// Connessione al database (sostituisci con le tue credenziali)
include "../../db_connector.php";

$conn = new mysqli($sName, $uName, $pass, $db_name);

if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Prepara la query con un prepared statement per inserire i dati nella tabella sx_revisori_sbobine
$sql = "INSERT INTO sx_revisori_sbobine (id_sbobina, id_revisore) VALUES (?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ii", $sbobinaId, $revisoreId);

    if ($stmt->execute()) {
        echo "Sei diventato revisore di questa lezione. Buon lavoro!";
    } else {
        echo "Errore nell'esecuzione della query: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Errore nella preparazione della query: " . $conn->error;
}

$conn->close();
?>

