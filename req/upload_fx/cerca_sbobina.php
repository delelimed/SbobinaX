<?php
if (isset($_POST['sbobinaId'])) {
    $sbobinaId = $_POST['sbobinaId'];
    include "../../db_connector.php";

    // Esegui la query per cercare l'ID sbobina nella tabella "sbobine_calendarizzate" e ottenere i dati associati
    if ($conn->connect_error) {
        die('Connessione al database fallita: ' . $conn->connect_error);
    }

    $query = "SELECT insegnamento, data_lezione FROM sx_sbobine_calendarizzate WHERE id = $sbobinaId";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // ID sbobina trovato, ottieni i dati associati
        $row = $result->fetch_assoc();
        $idInsegnamento = $row['insegnamento'];
        $dataLezione = $row['data_lezione'];

        // Esegui la query per ottenere gli sbobinatori associati all'ID sbobina
        $querySbobinatori = "SELECT id_sbobinatore FROM sx_sbobinatori_sbobine WHERE id_sbobina = $sbobinaId";
        $resultSbobinatori = $conn->query($querySbobinatori);
        $sbobinatori = array();

        if ($resultSbobinatori->num_rows > 0) {
            while ($rowSbobinatori = $resultSbobinatori->fetch_assoc()) {
                $sbobinatoreId = $rowSbobinatori['id_sbobinatore'];
                $sbobinatori[] = $sbobinatoreId;
            }
        }

        // Esegui la query per ottenere i revisori associati all'ID sbobina
        $queryRevisori = "SELECT id_revisore FROM sx_revisori_sbobine WHERE id_sbobina = $sbobinaId";
        $resultRevisori = $conn->query($queryRevisori);
        $revisori = array();

        if ($resultRevisori->num_rows > 0) {
            while ($rowRevisori = $resultRevisori->fetch_assoc()) {
                $revisoreId = $rowRevisori['id_revisore'];
                $revisori[] = $revisoreId;
            }
        }

        // Esegui la query per ottenere tutti gli inserimenti dalla tabella "users"
        $queryUsers = "SELECT id, nome, cognome FROM sx_users";
        $resultUsers = $conn->query($queryUsers);
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

    $conn->close();
}

?>
