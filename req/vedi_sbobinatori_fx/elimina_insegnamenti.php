<?php
// Connessione al database e altre configurazioni, se necessarie
include "../../db_connector.php";

// Verifica se la richiesta è stata inviata con il metodo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Controlla se è stato inviato l'ID dell'utente
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Esegui l'azione di eliminazione delle voci nella tabella "partecipazione_sbobine" per l'utente corrente
        $sql = "DELETE FROM partecipazione_sbobine WHERE id_user = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            // Eliminazione avvenuta con successo
            $response = array(
                "success" => true,
                "message" => "Eliminazione delle voci avvenuta con successo!"
            );
            echo json_encode($response);
        } else {
            // Errore durante l'eliminazione delle voci
            $response = array(
                "success" => false,
                "message" => "Si è verificato un errore durante l'eliminazione delle voci."
            );
            echo json_encode($response);
        }

        $stmt->close();
    } else {
        // Se manca l'ID, restituisci una risposta di errore
        $response = array(
            "success" => false,
            "message" => "ID mancante. Impossibile eliminare le voci."
        );
        echo json_encode($response);
    }
} else {
    // Se la richiesta non è stata inviata con il metodo POST, restituisci un messaggio di errore
    $response = array(
        "success" => false,
        "message" => "Richiesta non valida. Utilizzare il metodo POST per eliminare le voci."
    );
    echo json_encode($response);
}
?>
