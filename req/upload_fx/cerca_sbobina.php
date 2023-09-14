<?php
if (isset($_POST['sbobinaId'])) {
    $sbobinaId = $_POST['sbobinaId'];
    include "../../db_connector.php";

    // Esegui la query per cercare l'ID sbobina nella tabella "sbobine_calendarizzate" e ottenere i dati associati
    if ($conn->connect_error) {
        die('Connessione al database fallita: ' . $conn->connect_error);
    }

    // Query parametrizzata per ottenere i dati della sbobina
    $query = "SELECT insegnamento, data_lezione FROM sx_sbobine_calendarizzate WHERE id = ?";

    // Prepara la query
    $stmt = $conn->prepare($query);

    // Lega il parametro e imposta il tipo di dati
    $stmt->bind_param("i", $sbobinaId);

    // Esegui la query
    $stmt->execute();

    // Ottieni il risultato
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // ID sbobina trovato, ottieni i dati associati
        $row = $result->fetch_assoc();
        $idInsegnamento = $row['insegnamento'];
        $dataLezione = $row['data_lezione'];

        // Esegui la query parametrizzata per ottenere gli sbobinatori associati all'ID sbobina
        $querySbobinatori = "SELECT id_sbobinatore FROM sx_sbobinatori_sbobine WHERE id_sbobina = ?";

        // Prepara la query
        $stmtSbobinatori = $conn->prepare($querySbobinatori);

        // Lega il parametro e imposta il tipo di dati
        $stmtSbobinatori->bind_param("i", $sbobinaId);

        // Esegui la query
        $stmtSbobinatori->execute();

        // Ottieni il risultato
        $resultSbobinatori = $stmtSbobinatori->get_result();

        $sbobinatori = array();

        if ($resultSbobinatori->num_rows > 0) {
            while ($rowSbobinatori = $resultSbobinatori->fetch_assoc()) {
                $sbobinatoreId = $rowSbobinatori['id_sbobinatore'];
                $sbobinatori[] = $sbobinatoreId;
            }
        }

        // Esegui la query parametrizzata per ottenere i revisori associati all'ID sbobina
        $queryRevisori = "SELECT id_revisore FROM sx_revisori_sbobine WHERE id_sbobina = ?";

        // Prepara la query
        $stmtRevisori = $conn->prepare($queryRevisori);

        // Lega il parametro e imposta il tipo di dati
        $stmtRevisori->bind_param("i", $sbobinaId);

        // Esegui la query
        $stmtRevisori->execute();

        // Ottieni il risultato
        $resultRevisori = $stmtRevisori->get_result();

        $revisori = array();

        if ($resultRevisori->num_rows > 0) {
            while ($rowRevisori = $resultRevisori->fetch_assoc()) {
                $revisoreId = $rowRevisori['id_revisore'];
                $revisori[] = $revisoreId;
            }
        }

        // Esegui la query parametrizzata per ottenere tutti gli inserimenti dalla tabella "users"
        $queryUsers = "SELECT id, nome, cognome FROM sx_users";

        // Prepara la query
        $stmtUsers = $conn->prepare($queryUsers);

        // Esegui la query
        $stmtUsers->execute();

        // Ottieni il risultato
        $resultUsers = $stmtUsers->get_result();

        $allUsers = array();

        if ($resultUsers->num_rows > 0) {
            while ($rowUsers = $resultUsers->fetch_assoc()) {
                $userId = $rowUsers['id'];
                $userName = $rowUsers['nome'];
                $userSurname = $rowUsers['cognome'];
                $allUsers[] = array('id' => $userId, 'nome' => $userName, 'cognome' => $userSurname);
            }
        }

        // Invia i dati al client in formato JSON
        echo json_encode(['success' => true, 'idInsegnamento' => $idInsegnamento, 'dataLezione' => $dataLezione, 'sbobinatori' => $sbobinatori, 'revisori' => $revisori, 'allUsers' => $allUsers]);
    } else {
        // ID sbobina non trovato, mostra un messaggio di errore
        echo json_encode(['success' => false, 'message' => 'ID sbobina non trovato']);
    }

    // Chiudi le connessioni
    $stmt->close();
    $stmtSbobinatori->close();
    $stmtRevisori->close();
    $stmtUsers->close();
    $conn->close();
}
?>

