<?php
// Codice PHP per la ricerca dell'ID sbobina
if (isset($_POST['sbobinaId'])) {
    $sbobinaId = $_POST['sbobinaId'];
    include "../../db_connector.php";

    // Esegui la query per cercare l'ID sbobina nella tabella "sbobine_calendarizzate"
    if ($conn->connect_error) {
        die('Connessione al database fallita: ' . $conn->connect_error);
    }

    $query = "SELECT * FROM sbobine_calendarizzate WHERE id = $sbobinaId";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // ID sbobina trovato, puoi gestire la risposta e inviare i dati alla pagina del form
        // Ad esempio, puoi impostare i valori dei campi del form o mostrare un messaggio di successo.
        // Questa operazione viene gestita nella funzione cercaSbobina() nel codice JavaScript.
        echo json_encode(['success' => true, 'message' => 'ID sbobina trovato']);
    } else {
        // ID sbobina non trovato, puoi gestire la risposta o mostrare un messaggio di errore.
        // Questa operazione viene gestita nella funzione cercaSbobina() nel codice JavaScript.
        echo json_encode(['success' => false, 'message' => 'ID sbobina non trovato']);
    }

    $conn->close();
}
?>


