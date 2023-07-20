<?php
// registrazione.php
include "../db_connector.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ottieni i dati dal modulo di registrazione
    $nome = $_POST["Nome"];
    $cognome = $_POST["Cognome"];
    $matricola = $_POST["Matricola"];
    $email = $cognome.".".$matricola."@studenti.uniroma1.it";
    $password = $_POST["Password"];


    // Verifica eventuali errori di connessione
    if ($conn->connect_error) {
        die("Connessione al database fallita: " . $conn->connect_error);
    }

    // Prepara e esegui la query per inserire i dati nel database
    $query = "INSERT INTO users (matricola, nome, cognome, email, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssss", $matricola, $nome, $cognome, $email, $password);

    if ($stmt->execute()) {
        header("Location: ../templates/Inserisci_Sbobinatori.php");
        exit();
    } else {
        echo "Errore durante la registrazione.";
    }

    // Chiudi la connessione al database
    $conn->close();
}
?>

