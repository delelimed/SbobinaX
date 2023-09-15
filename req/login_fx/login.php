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
        $sql = "SELECT id, matricola, nome, cognome, email, password, admin, locked FROM sx_users WHERE matricola=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $uname);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            // Verifica la password utilizzando password_verify()
            if (password_verify($password, $row['password'])) {
                if ($row['locked'] == 1) {
                    $em = "Account bloccato. Contatta l'amministratore.";
                    header("Location: ../../templates/login.php?error=$em");
                    exit();
                }

                // Password corretta, autentica l'utente e impostane le variabili di sessione
                $_SESSION['matricola'] = $row['matricola'];
                $_SESSION['nome'] = $row['nome'];
                $_SESSION['cognome'] = $row['cognome'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['admin'] = $row['admin'];
                $_SESSION['locked'] = $row['locked'];

                if (isset($_SESSION['id'])) {
                    // Esegui una query parametrica per cercare un messaggio non "visto" nella tabella sx_sbobine_rifiutate
                    $query = "SELECT id, motivo, id_revisore, id_sbobina FROM sx_sbobine_rigettate WHERE id_sbobinatore = ? AND visto = 0";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("i", $_SESSION['id']);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $messaggioId = $row['id'];
                        $messaggioMotivo = $row['motivo'];
                        $idRevisore = $row['id_revisore'];
                        $idSbobina = $row['id_sbobina'];

                        // Mostra il messaggio all'utente
                        $_SESSION['messaggio_sbobina_rifiutata'] = $messaggioMotivo;
                        $_SESSION['id_revisore'] = $idRevisore;
                        $_SESSION['id_sbobina'] = $idSbobina;

                        // Aggiorna il campo "visto" nella tabella sx_sbobine_rifiutate
                        $updateQuery = "UPDATE sx_sbobine_rigettate SET visto = 1 WHERE id = ?";
                        $stmt = $conn->prepare($updateQuery);
                        $stmt->bind_param("i", $messaggioId);
                        $stmt->execute();
                    }
                }

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
?>
