<?php
// modifica_sbobinatore.php
include "../db_connector.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ottieni i dati modificati dal form
    $idRiga = $_POST['id'];
    $nuovaMatricola = $_POST['matricola'];
    $nuovoNome = $_POST['nome'];
    $nuovoCognome = $_POST['cognome'];

    // Verifica eventuali errori di connessione
    if ($conn->connect_error) {
        die("Connessione al database fallita: " . $conn->connect_error);
    }

    // Prepara e esegui la query per ottenere il valore corrente del malus dal database
    $queryGetMalus = "SELECT malus FROM users WHERE id = ?";
    $stmtGetMalus = $conn->prepare($queryGetMalus);
    $stmtGetMalus->bind_param('i', $idRiga);
    $stmtGetMalus->execute();
    $resultGetMalus = $stmtGetMalus->get_result();
    $rowGetMalus = $resultGetMalus->fetch_assoc();
    $malusCorrente = $rowGetMalus['malus'];
    $stmtGetMalus->close();

    // Incrementa il malus di 1
    $nuovoMalus = $malusCorrente + 1;

    // Prepara e esegui la query per aggiornare i dati nel database
    $query = "UPDATE users SET matricola = ?, nome = ?, cognome = ?, malus = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sssii', $nuovaMatricola, $nuovoNome, $nuovoCognome, $nuovoMalus, $idRiga);

    if ($stmt->execute()) {
        // L'aggiornamento è avvenuto con successo
        $response = array(
            'success' => true,
            'message' => 'Riga aggiornata con successo!',
        );
    } else {
        // Errore durante l'aggiornamento
        $response = array(
            'success' => false,
            'message' => 'Errore durante l\'aggiornamento della riga: ' . $conn->error,
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
