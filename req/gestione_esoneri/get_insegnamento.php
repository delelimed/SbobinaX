<?php
// Connessione al database
include '../../db_connector.php';

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

if (isset($_POST['idEsame'])) {
    $idEsame = $_POST['idEsame'];

    // Query per ottenere l'insegnamento e la data esonero
    $sql = "SELECT insegnamento, data_esonero FROM sx_esamidisponibili WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idEsame);
    $stmt->execute();
    $stmt->bind_result($insegnamento, $dataEsonero);
    $stmt->fetch();

    // Formatta la data nel formato "dd-mm-yyyy"
    $dataEsoneroFormattata = date("d-m-Y", strtotime($dataEsonero));

    // Creare un array associativo con entrambi i dati
    $result = array(
        'insegnamento' => $insegnamento,
        'dataEsonero' => $dataEsoneroFormattata
    );

    // Restituire i dati come JSON
    header('Content-Type: application/json');
    echo json_encode($result);

    // Chiudi la connessione al database
    $conn->close();
}
?>
