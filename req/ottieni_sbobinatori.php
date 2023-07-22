<?php
// ottieni_sbobinatori.php

// Connessione al database e altre impostazioni
include "../db_connector.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Controlla se l'ID della sbobina è stato passato tramite GET
if (isset($_GET['idSbobina'])) {
    $idSbobina = $_GET['idSbobina'];

    // Esegui la query per ottenere gli sbobinatori associati a questa sbobina
    // Utilizza prepared statements per evitare SQL injection
    $query = "SELECT sbobinatori_sbobine.id_sbobina, sbobinatori_sbobine.id_sbobinatore
              FROM sbobinatori_sbobine
              INNER JOIN users ON sbobinatori_sbobine.id_sbobinatore = users.id
              WHERE sbobinatori_sbobine.id_sbobina = ?";

    // Prepara la query
    $stmt = $conn->prepare($query);

    // Bind del parametro $idSbobina
    $stmt->bind_param("i", $idSbobina);

    // Esegui la query
    $stmt->execute();

    // Ottieni i risultati
    $result = $stmt->get_result();

    // Verifica se la query ha avuto successo
    if ($result) {
        $risultati = array();

        // Cicla attraverso i risultati della query e memorizza gli sbobinatori in un array
        while ($row = $result->fetch_assoc()) {
            $risultati[] = $row;
        }

        // Formatta i risultati come JSON e invia la risposta
        echo json_encode(array('sbobinatori' => $risultati));
    } else {
        // In caso di errore nella query, restituisci un messaggio di errore
        echo json_encode(array('error' => 'Errore durante l\'esecuzione della query.'));
    }
}
?>
