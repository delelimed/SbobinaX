<?php
// Includi l'autoloader di PHPMailer e il file di configurazione del database
require '../../assets/plugins/PHPMailer/src/PHPMailer.php';
require '../../assets/plugins/PHPMailer/src/SMTP.php';
require '../../assets/plugins/PHPMailer/src/Exception.php';
require '../../db_connector.php';

// Recupera i dati di configurazione del server dalla tabella "settings" del database
// Supponiamo che il record con le configurazioni del server abbia i campi: smtp_host, smtp_port, smtp_username, smtp_password, email_from
// Assicurati di adattare i nomi dei campi ai corrispondenti nella tua tabella
$queryConfig = "SELECT smtp_host, smtp_port, smtp_username, smtp_password, email_from FROM settings WHERE id = ?";
$stmtConfig = $conn->prepare($queryConfig);
$configId = 1; // Sostituisci con l'ID del record desiderato
$stmtConfig->bind_param("i", $configId);
$stmtConfig->execute();
$stmtConfig->bind_result($smtpHost, $smtpPort, $smtpUsername, $encryptedPassword, $emailFrom);

if ($stmtConfig->fetch()) {
    $passwordSMTP = 'password_inserita_dall_utente'; // Sostituisci con la password inserita dall'utente
    if (password_verify($passwordSMTP, $encryptedPassword)) {
        // Istanza di PHPMailer
        $mail = new PHPMailer\PHPMailer\PHPMailer();

        // Configura le impostazioni del server SMTP
        $mail->isSMTP();
        $mail->Host = $smtpHost;
        $mail->Port = $smtpPort;
        $mail->SMTPAuth = true;
        $mail->Username = $smtpUsername;
        $mail->Password = $encryptedPassword; // La password è già stata decrittografata

        // Configura il mittente e il destinatario dell'email
        $mail->setFrom($emailFrom, $smtpUsername); // Inserisci il tuo nome come mittente
        $mail->addAddress('delrossoelia@gmail.com', 'ROOT'); // Inserisci l'indirizzo e il nome del destinatario

        // Contenuto dell'email
        $mail->isHTML(true); // Imposta il formato dell'email su HTML
        $mail->Subject = 'Oggetto dell\'email';
        $mail->Body = 'Contenuto dell\'email in formato HTML. Puoi utilizzare tag HTML qui.';

        // Se desideri includere una versione di testo semplice dell'email
        $mail->AltBody = 'Questo è il testo alternativo per gli utenti che non supportano HTML.';

        // Invia l'email e controlla se c'è qualche errore
        if (!$mail->send()) {
            echo 'Messaggio non inviato. Errore: ' . $mail->ErrorInfo;
        } else {
            echo 'Messaggio inviato con successo!';
        }
    } else {
        echo 'Password errata. Impossibile inviare l\'email.';
    }
} else {
    echo 'Impossibile recuperare le configurazioni del server.';
}

$stmtConfig->close();
$conn->close();
?>

```
