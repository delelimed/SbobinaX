<?php

// registrazione.php
include "../db_connector.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ottieni i dati dal modulo di registrazione
    $nome = $_POST["Nome"];
    $cognome = $_POST["Cognome"];
    $matricola = $_POST["Matricola"];
    $email = $cognome . "." . $matricola . "@studenti.uniroma1.it";
    $password = $_POST["Password"];
    $admin = $_POST["admin"]; // Ottieni il valore dell'input nascosto "admin"

    // Verifica eventuali errori di connessione
    if ($conn->connect_error) {
        die("Connessione al database fallita: " . $conn->connect_error);
    }

    // Crea l'hash della password utilizzando bcrypt
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepara e esegui la query per inserire i dati nel database
    $query = "INSERT INTO users (matricola, nome, cognome, email, password, admin) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssi", $matricola, $nome, $cognome, $email, $password, $admin); // Usa $hashedPassword invece di $password

    if ($stmt->execute()) {
        $em = "Sbobinatore Registrato con Successo!";
        header("Location: ../templates/Inserisci_Sbobinatori.php?status=$em");
        exit();
    } else {
        echo "Errore durante la registrazione.";
    }

    // Chiudi la connessione al database
    $conn->close();
}


?>

