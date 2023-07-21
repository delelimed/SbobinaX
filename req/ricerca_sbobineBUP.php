<?php
// Verifica che la richiesta sia di tipo POST
include '../db_connector.php';

    // Verifica se la connessione è riuscita
    if ($conn->connect_error) {
        die("Connessione al database fallita: " . $conn->connect_error);
    }

    // Ottieni il valore di ricerca inviato dal modulo
    $search_term = $_POST["table_search"];

    // Esegui la query per cercare le bobine nel database (da adattare in base alla tua struttura di database)
    $sql = "SELECT * FROM sbobine_calendarizzate WHERE insegnamento LIKE '%$search_term%'";
    $result = $conn->query($sql);

    // Chiudi la connessione al database
    $conn->close();

    // Mostra i risultati della ricerca
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"] . ", Nome: " . $row["nome"] . "<br>";
            // Puoi aggiungere altre informazioni che desideri visualizzare
        }
    } else {
        echo "Nessun risultato trovato.";

}
?>
