<?php
// registrazione.php
include "../db_connector.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ottieni i dati dal modulo di registrazione
    $insegnamento = $_POST["Insegnamento"];


    // Verifica eventuali errori di connessione
    if ($conn->connect_error) {
        die("Connessione al database fallita: " . $conn->connect_error);
    }

    // Prepara e esegui la query per inserire i dati nel database
    $query = "INSERT INTO sx_insegnamenti (materia) VALUES (?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $insegnamento);

    if ($stmt->execute()) {
        $em = "Insegnamento Registrato con Successo!";
        header("Location: ../templates/Inserisci_Insegnamento.php?status=$em");
        exit();
    } else {
        echo "Errore durante la registrazione.";
    }

    // Chiudi la connessione al database
    $conn->close();
}
?>
