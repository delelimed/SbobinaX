<?php
session_start();
$sbobinaId = $_POST['sbobinaId'];
$sbobinatoreId = $_SESSION['id'];

// Connessione al database (sostituisci con le tue credenziali)
include "../../db_connector.php";

$conn = new mysqli($sName, $uName, $pass, $db_name);

if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Prepara la query con un prepared statement per inserire i dati nella tabella sx_sbobinatori_sbobine
$sql = "INSERT INTO sx_sbobinatori_sbobine (id_sbobina, id_sbobinatore) VALUES (?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ii", $sbobinaId, $sbobinatoreId);

    if ($stmt->execute()) {
        echo "Sei diventato sbobinatore di questa lezione. Buon lavoro!";
    } else {
        echo "Errore nell'esecuzione della query: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Errore nella preparazione della query: " . $conn->error;
}

$conn->close();
?>

