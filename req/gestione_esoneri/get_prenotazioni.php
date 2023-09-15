<?php
if (isset($_POST['idEsame'])) {
    // Connessione al database
    include "../../db_connector.php";

    // Verifica della connessione
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    // Ottieni l'id dell'esame
    $idEsame = $_POST['idEsame'];

    // Query per ottenere le prenotazioni in base all'id dell'esame
    $query = "SELECT id, matricola, nome, cognome, dataora_prenotazione FROM sx_prenesami WHERE id_esame = ? ORDER BY cognome";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $idEsame);
    $stmt->execute();
    $result = $stmt->get_result();

    // Costruisci una tabella HTML con le righe delle prenotazioni, inclusa la data di iscrizione
    $table = '<table class="table table-bordered">';
    $table .= '<thead><tr><th>Matricola</th><th>Cognome</th><th>Nome</th><th>Data di Iscrizione</th></tr></thead>';
    $table .= '<tbody>';
    while ($row = $result->fetch_assoc()) {
        $dataIscrizione = date_format(date_create($row['dataora_prenotazione']), 'd-m-Y H:i:s');
        $table .= '<tr>';
        $table .= '<td>' . $row['matricola'] . '</td>';
        $table .= '<td>' . $row['cognome'] . '</td>';
        $table .= '<td>' . $row['nome'] . '</td>';
        $table .= '<td>' . $dataIscrizione . '</td>';
        $table .= '</tr>';
    }
    $table .= '</tbody></table>';

    echo $table;

    // Chiudi la connessione al database
    $conn->close();
}



?>

