<?php
include '../../db_connector.php';
$queryConfig = "SELECT nome_impostazione, attuale FROM sx_settings WHERE nome_impostazione IN ('TOKEN', 'ID_GRUPPO')";
$stmtConfig = $conn->prepare($queryConfig);
if ($stmtConfig === false) {
    die("Errore nella preparazione dello statement: " . $conn->error);
}
$stmtConfig->execute();
$stmtConfig->bind_result($nomeImpostazione, $valore);
$configValues = array();
while ($stmtConfig->fetch()) {
    $configValues[$nomeImpostazione] = $valore;
}
$stmtConfig->close();
$conn->close();
$botToken = $configValues['TOKEN'];
$chatId = $configValues['ID_GRUPPO'];
require_once '../../vendor/autoload.php';
//include '../../TgConfigurator.php';
$bot = new TelegramBot\Api\BotApi($botToken);
$message = "*SBOBINAX - Prova Configurazione:* \nIl presente è un messaggio di prova.";
$bot->sendMessage($chatId, $message, 'Markdown');
$stmtConfig->close();
$conn->close();
?>

```
