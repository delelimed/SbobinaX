<?php
session_start();

if (isset($_POST['uname']) && isset($_POST['password'])) {
    include "../../db_connector.php";

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $password = validate($_POST['password']);

    if (empty($uname) || empty($password)) {
        $em = "Matricola and Password are Required";
        header("Location: ../../templates/login.php?error=$em");
        exit;
    } else {
        // Query utilizzando prepared statements per ottenere l'hash dell'utente dal database
        $sql = "SELECT id, matricola, nome, cognome, password, admin, locked FROM users WHERE matricola=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $uname);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            // Verifica la password utilizzando password_verify()
            if (password_verify($password, $row['password'])) {
                // Password corretta, autentica l'utente e impostane le variabili di sessione
                $_SESSION['matricola'] = $row['matricola'];
                $_SESSION['nome'] = $row['nome'];
                $_SESSION['cognome'] = $row['cognome'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['admin'] = $row['admin'];
                $_SESSION['locked'] = $row['locked'];

                header("Location: ../../templates/home.php");
                exit();
            } else {
                $em = "Password non valida";
                header("Location: ../../templates/login.php?error=$em");
                exit();
            }
        } else {
            $em = "Utente non trovato";
            header("Location: ../../templates/login.php?error=$em");
            exit();
        }
    }
} else {
    header("Location: ../../templates/login.php");
    exit;
}
