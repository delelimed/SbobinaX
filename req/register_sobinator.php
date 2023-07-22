<?php
// registrazione.php
include "../db_connector.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ottieni i dati dal modulo di registrazione
    $nome = $_POST["Nome"];
    $cognome = $_POST["Cognome"];
    $matricola = $_POST["Matricola"];
    $email = $cognome . "." . $matricola . "@studenti.uniroma1.it";
    $password = $_POST["Matricola"];
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
        // Ottieni l'ID dell'utente appena registrato
        $user_id = $stmt->insert_id;

        // Inserisci i dati nella tabella "partecipazione_sbobine" per ogni insegnamento selezionato
        if (isset($_POST['insegnamenti'])) {
            $insegnamenti_selezionati = $_POST['insegnamenti'];
            foreach ($insegnamenti_selezionati as $insegnamento_id) {
                // Esegui la query di inserimento
                $query_partecipazione = "INSERT INTO partecipazione_sbobine (id_user, id_insegnamento) VALUES (?, ?)";
                $stmt_partecipazione = $conn->prepare($query_partecipazione);
                $stmt_partecipazione->bind_param("ii", $user_id, $insegnamento_id);
                $stmt_partecipazione->execute();
            }
        }

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
