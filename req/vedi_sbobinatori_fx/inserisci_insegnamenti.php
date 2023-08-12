<?php
// Connessione al database e altre configurazioni, se necessarie
include "../../db_connector.php";

// Verifica se la richiesta è stata inviata con il metodo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Controlla se sono stati inviati i dati necessari dal form
    if (isset($_POST['id_user']) && isset($_POST['id_insegnamento'])) {
        $id_user = $_POST['id_user'];
        $id_insegnamento = $_POST['id_insegnamento'];

        // Esegui l'azione di inserimento del nuovo insegnamento nella tabella "partecipazione_sbobine"
        $sql = "INSERT INTO sx_partecipazione_sbobine (id_user, id_insegnamento) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $id_user, $id_insegnamento);

        if ($stmt->execute()) {
            // Inserimento avvenuto con successo
            $response = array(
                "success" => true,
                "message" => "Inserimento del nuovo insegnamento avvenuto con successo!"
            );
            echo json_encode($response);
        } else {
            // Errore durante l'inserimento del nuovo insegnamento
            $response = array(
                "success" => false,
                "message" => "Si è verificato un errore durante l'inserimento del nuovo insegnamento."
            );
            echo json_encode($response);
        }

        $stmt->close();
    } else {
        // Se mancano dati, restituisci una risposta di errore
        $response = array(
            "success" => false,
            "message" => "Dati mancanti. Impossibile inserire il nuovo insegnamento."
        );
        echo json_encode($response);
    }
} else {
    // Se la richiesta non è stata inviata con il metodo POST, restituisci un messaggio di errore
    $response = array(
        "success" => false,
        "message" => "Richiesta non valida. Utilizzare il metodo POST per inserire il nuovo insegnamento."
    );
    echo json_encode($response);
}
?>

