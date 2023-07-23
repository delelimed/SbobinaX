<?php
// update_password.php
include "../../db_connector.php";

// Avvia la sessione per accedere ai dati dell'utente corrente
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ottieni i dati dal modulo di aggiornamento password
    $nuovaPassword = $_POST["Password"];

    // Verifica se il campo "Password" è stato compilato
    if (!empty($nuovaPassword)) {
        // Recupera l'ID dell'utente corrente dalla sessione
        if (isset($_SESSION['id'])) {
            $idUtente = $_SESSION['id'];

            // Genera l'hash della nuova password
            $hashedPassword = password_hash($nuovaPassword, PASSWORD_DEFAULT);

            // Verifica eventuali errori di connessione
            if ($conn->connect_error) {
                die("Connessione al database fallita: " . $conn->connect_error);
            }

            // Prepara e esegui la query per aggiornare la password nel database
            $query = "UPDATE users SET password = ? WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("si", $nuovaPassword, $idUtente);

            if ($stmt->execute()) {
                // Password aggiornata con successo
                $em = "Password aggiornata con successo!";
                header("Location: ../../templates/Account.php?status=$em");
                exit();
            } else {
                // Errore durante l'aggiornamento della password
                echo "Errore durante l'aggiornamento della password.";
            }

            // Chiudi lo statement e la connessione al database
            $stmt->close();
        } else {
            echo "ID utente non trovato nella sessione. Effettua il login.";
        }
    } else {
        // Il campo "Password" è vuoto, non eseguire alcun aggiornamento
        echo "Nessuna password inserita, nessun aggiornamento eseguito.";
    }

    $conn->close();
}
?>
