<?php
// get_dati_utente.php
include "../db_connector.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idRiga = $_POST['id'];

    // Ottieni i dati dell'utente
    $queryGetUtente = "SELECT * FROM sx_users WHERE id = ?";
    $stmtGetUtente = $conn->prepare($queryGetUtente);
    $stmtGetUtente->bind_param('i', $idRiga);
    $stmtGetUtente->execute();
    $resultGetUtente = $stmtGetUtente->get_result();
    $data = $resultGetUtente->fetch_assoc();
    $stmtGetUtente->close();

    // Ottieni gli insegnamenti associati all'utente
    $queryGetInsegnamentiUtente = "SELECT id_insegnamento FROM sx_partecipazione_sbobine WHERE id_user = ?";
    $stmtGetInsegnamentiUtente = $conn->prepare($queryGetInsegnamentiUtente);
    $stmtGetInsegnamentiUtente->bind_param('i', $idRiga);
    $stmtGetInsegnamentiUtente->execute();
    $resultGetInsegnamentiUtente = $stmtGetInsegnamentiUtente->get_result();
    $insegnamenti = array();
    while ($row = $resultGetInsegnamentiUtente->fetch_assoc()) {
        $insegnamenti[] = $row['id_insegnamento'];
    }
    $stmtGetInsegnamentiUtente->close();

    $response = array(
        'success' => true,
        'data' => array(
            'id' => $data['id'],
            'matricola' => $data['matricola'],
            'nome' => $data['nome'],
            'cognome' => $data['cognome'],
            'malus' => $data['malus'],
            'insegnamenti' => $insegnamenti,
        ),
    );

    // Restituisci la risposta come JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>


