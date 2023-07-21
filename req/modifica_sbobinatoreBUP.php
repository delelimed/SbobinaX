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

    // Prepara e esegui la query per aggiornare i dati dello sbobinatore nel database
    $queryUpdateSbobinatore = "UPDATE users SET matricola = ?, nome = ?, cognome = ?, malus = ? WHERE id = ?";
    $stmtUpdateSbobinatore = $conn->prepare($queryUpdateSbobinatore);
    $stmtUpdateSbobinatore->bind_param('sssii', $nuovaMatricola, $nuovoNome, $nuovoCognome, $nuovoMalus, $idRiga);

    // Prepara e esegui la query per aggiornare gli insegnamenti associati allo sbobinatore nel database
    if (isset($_POST['insegnamenti'])) {
        // Rimuovi gli insegnamenti precedenti associati allo sbobinatore
        $queryRemoveInsegnamenti = "DELETE FROM partecipazione_sbobine WHERE id_user = ?";
        $stmtRemoveInsegnamenti = $conn->prepare($queryRemoveInsegnamenti);
        $stmtRemoveInsegnamenti->bind_param('i', $idRiga);
        $stmtRemoveInsegnamenti->execute();
        $stmtRemoveInsegnamenti->close();

        // Aggiungi gli insegnamenti selezionati associati allo sbobinatore
        $insegnamentiSelezionati = $_POST['insegnamenti'];
        $queryAddInsegnamenti = "INSERT INTO partecipazione_sbobine (id_user, id_insegnamento) VALUES (?, ?)";
        $stmtAddInsegnamenti = $conn->prepare($queryAddInsegnamenti);
        $stmtAddInsegnamenti->bind_param('ii', $idRiga, $idInsegnamento);

        foreach ($insegnamentiSelezionati as $idInsegnamento) {
            $stmtAddInsegnamenti->execute();
        }

        $stmtAddInsegnamenti->close();
    }

    // Esegui l'aggiornamento dello sbobinatore nel database
    if ($stmtUpdateSbobinatore->execute()) {
        // L'aggiornamento è avvenuto con successo
        $response = array(
            'success' => true,
            'message' => 'Sbobinatore aggiornato con successo!',
        );
    } else {
        // Errore durante l'aggiornamento
        $response = array(
            'success' => false,
            'message' => 'Errore durante l\'aggiornamento della riga: ' . $conn->error,
        );
    }

    // Chiudi gli statement e la connessione al database
    $stmtUpdateSbobinatore->close();
    $conn->close();

    // Restituisci la risposta come JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
