<?php
// Connessione al database
include '../../db_connector.php';

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Verifica se sono stati inviati dati dal modulo
if (isset($_POST['insegnamento']) && isset($_POST['docente']) && isset($_POST['data_esonero']) && isset($_POST['data_iscrizione'])) {
    // Recupera i dati dal modulo
    $insegnamento = $_POST['insegnamento'];
    $docente = $_POST['docente'];
    $data_esonero = $_POST['data_esonero'];
    $data_iscrizione = $_POST['data_iscrizione'];

    // Prepara e esegui una query SQL per inserire i dati nella tabella
    $sql = "INSERT INTO sx_esamidisponibili (insegnamento, docente, data_esonero, data_scadiscrizioni) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $insegnamento, $docente, $data_esonero, $data_iscrizione);

    if ($stmt->execute()) {
        // Inserimento riuscito
        echo "Inserimento avvenuto con successo.";
    } else {
        // Gestione degli errori
        echo "Errore durante l'inserimento: " . $stmt->error;
    }

    // Chiudi la connessione al database
    $stmt->close();
} else {
    // Dati mancanti dal modulo
    echo "Errore: Dati mancanti dal modulo.";
}

// Chiudi la connessione al database
$conn->close();
?>
