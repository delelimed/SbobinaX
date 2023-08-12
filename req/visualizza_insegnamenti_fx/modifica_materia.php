<?php
// modifica_materia.php
include "../../db_connector.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ottieni l'ID della riga da modificare e il nuovo valore della materia dal form
    $idRiga = $_POST['id'];
    $nuovaMateria = $_POST['materia'];

    // Verifica eventuali errori di connessione
    if ($conn->connect_error) {
        die("Connessione al database fallita: " . $conn->connect_error);
    }

    // Prepara e esegui la query per la modifica della materia nel database
    $query = "UPDATE sx_insegnamenti SET materia = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('si', $nuovaMateria, $idRiga);

    if ($stmt->execute()) {
        // La modifica è avvenuta con successo
        $response = array(
            'success' => true,
            'message' => 'Modifica avvenuta con successo!',
        );
    } else {
        // Errore durante la modifica
        $response = array(
            'success' => false,
            'message' => 'Errore durante la modifica della materia: ' . $conn->error,
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
