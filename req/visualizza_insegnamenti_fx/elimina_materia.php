<?php
// elimina_materia.php
include "../../db_connector.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ottieni l'ID della riga da eliminare dal form
    $idRiga = $_POST['id'];

    // Verifica eventuali errori di connessione
    if ($conn->connect_error) {
        die("Connessione al database fallita: " . $conn->connect_error);
    }

    // Prepara e esegui la query per eliminare la materia dal database
    $query = "DELETE FROM sx_insegnamenti WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $idRiga);

    if ($stmt->execute()) {
        // L'eliminazione è avvenuta con successo
        $response = array(
            'success' => true,
            'message' => 'Materia eliminata con successo!',
        );
    } else {
        // Errore durante l'eliminazione
        $response = array(
            'success' => false,
            'message' => 'Errore durante l\'eliminazione della materia: ' . $conn->error,
        );
    }

    // Chiudi lo statement e la connessione al database
    $stmt->close();
    $conn->close();

    // Restituisci la risposta come JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>

