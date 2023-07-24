<?php
// Connessione al database e altre configurazioni, se necessarie
include "../../db_connector.php";

// Verifica se la richiesta è stata inviata con il metodo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Controlla se sono stati inviati i dati necessari dal form
    if (isset($_POST['id']) && isset($_POST['matricola']) && isset($_POST['nome']) && isset($_POST['cognome']) && isset($_POST['malus'])) {
        $id = $_POST['id'];
        $matricola = $_POST['matricola'];
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        $malus = $_POST['malus'];


        // Esegui l'azione di modifica nel database per aggiornare l'utente
        $sql = "UPDATE users SET matricola = ?, nome = ?, cognome = ?, malus = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssii", $matricola, $nome, $cognome, $malus, $id);


        if ($stmt->execute()) {
            // Modifica avvenuta con successo
            $response = array(
                "success" => true,
                "message" => "Dati utente aggiornati con successo!"
            );
            echo json_encode($response);
        } else {
            // Errore durante l'aggiornamento del database
            $response = array(
                "success" => false,
                "message" => "Si è verificato un errore durante l'aggiornamento dell'utente."
            );
            echo json_encode($response);
        }

        $stmt->close();
    } else {
        // Se mancano dati, restituisci una risposta di errore
        $response = array(
            "success" => false,
            "message" => "Dati mancanti. Impossibile aggiornare l'utente."
        );
        echo json_encode($response);
    }
} else {
    // Se la richiesta non è stata inviata con il metodo POST, restituisci un messaggio di errore
    $response = array(
        "success" => false,
        "message" => "Richiesta non valida. Utilizzare il form di modifica per aggiornare l'utente."
    );
    echo json_encode($response);
}
?>
