<?php
// registrazione.php
include "../db_connector.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ottieni i dati dal modulo di registrazione
    $nome = $_POST["Nome"];
    $cognome = $_POST["Cognome"];
    $matricola = $_POST["Matricola"];
    $email = $_POST["email"];
    $password = $_POST["Matricola"]; // Inserisci il campo della password inserita dall'utente
    $admin = $_POST["admin"]; // Ottieni il valore dell'input nascosto "admin"

    // Verifica eventuali errori di connessione
    if ($conn->connect_error) {
        die("Connessione al database fallita: " . $conn->connect_error);
    }

    // Crea l'hash della password utilizzando password_hash()
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT, ['cost' => 15]);

    // Prepara e esegui la query per inserire i dati nel database utilizzando prepared statements
    $query = "INSERT INTO sx_users (matricola, nome, cognome, email, password, admin) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssss", $matricola, $nome, $cognome, $email, $hashedPassword, $admin);

    if ($stmt->execute()) {
        $user_id = $stmt->insert_id;

        // Inserisci i dati nella tabella "partecipazione_sbobine" per ogni insegnamento selezionato
        if (isset($_POST['insegnamenti'])) {
            $insegnamenti_selezionati = $_POST['insegnamenti'];
            foreach ($insegnamenti_selezionati as $insegnamento_id) {
                // Esegui la query di inserimento
                $query_partecipazione = "INSERT INTO sx_partecipazione_sbobine (id_user, id_insegnamento) VALUES (?, ?)";
                $stmt_partecipazione = $conn->prepare($query_partecipazione);
                $stmt_partecipazione->bind_param("ii", $user_id, $insegnamento_id);
                $stmt_partecipazione->execute();
            }
        }

        $em = "Sbobinatore Registrato con Successo!";
        header("Location: ../templates/Inserisci_Sbobinatori.php?status=$em");
        exit();
        $conn->close();
    } else {
        echo "Errore durante la registrazione.";
    }
}
?>

