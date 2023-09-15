<?php
if (isset($_POST['idEsame'])) {
    // Connessione al database
    include '../../db_connector.php';

    // Verifica della connessione
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    // Ottieni l'id dell'esame da eliminare
    $idEsame = $_POST['idEsame'];

    // Elimina tutte le colonne con "id-esame" uguale all'id dell'esame dalla tabella "sx_prenesami"
    $queryPrenesami = "DELETE FROM sx_prenesami WHERE id_esame = ?";
    $stmtPrenesami = $conn->prepare($queryPrenesami);
    $stmtPrenesami->bind_param("i", $idEsame);
    $stmtPrenesami->execute();
    $stmtPrenesami->close();

    // Elimina l'esame corrispondente dalla tabella "sx_esamidisponibili"
    $queryEsamidisponibili = "DELETE FROM sx_esamidisponibili WHERE id = ?";
    $stmtEsamidisponibili = $conn->prepare($queryEsamidisponibili);
    $stmtEsamidisponibili->bind_param("i", $idEsame);
    $stmtEsamidisponibili->execute();
    $stmtEsamidisponibili->close();

    // Chiudi la connessione al database
    $conn->close();

    echo 'success';
} else {
    echo 'error';
}
?>

