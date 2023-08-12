<?php
// get_email_utente.php
include "../../db_connector.php";

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Recupera l'ID dell'utente dalla richiesta AJAX
$user_id = $_GET['user_id'];

// Query per recuperare l'email dell'utente dal database utilizzando l'ID
$sql = "SELECT email FROM sx_users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($email);
$stmt->fetch();
$stmt->close();

// Restituisci l'email come risposta alla richiesta AJAX
echo json_encode(array('email' => $email));
?>
