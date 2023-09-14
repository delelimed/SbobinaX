<?php
include '../db_connector.php';

// Query per ottenere il numero di sbobine da svolgere
$sql1 = "SELECT COUNT(*) as num_sbobine_da_svolgere FROM sx_sbobine_calendarizzate WHERE caricata = 0";
$stmt1 = $conn->prepare($sql1);
$stmt1->execute();
$stmt1->bind_result($num_sbobine_da_svolgere);
$stmt1->fetch();
$stmt1->close();

// Query per ottenere il numero di sbobine da revisionare
$sql2 = "SELECT COUNT(*) as num_sbobine_da_revisionare FROM sx_sbobine_calendarizzate WHERE caricata = 1 AND revisione = 0";
$stmt2 = $conn->prepare($sql2);
$stmt2->execute();
$stmt2->bind_result($num_sbobine_da_revisionare);
$stmt2->fetch();
$stmt2->close();

// Query per ottenere il numero di sbobine pronte
$sql3 = "SELECT COUNT(*) as num_sbobine_pronte FROM sx_sbobine_calendarizzate WHERE caricata = 1 AND revisione = 1";
$stmt3 = $conn->prepare($sql3);
$stmt3->execute();
$stmt3->bind_result($num_sbobine_pronte);
$stmt3->fetch();
$stmt3->close();

// Query per ottenere il numero totale di sbobine
$sql4 = "SELECT COUNT(*) as num_sbobine FROM sx_sbobine_calendarizzate";
$stmt4 = $conn->prepare($sql4);
$stmt4->execute();
$stmt4->bind_result($num_sbobine);
$stmt4->fetch();
$stmt4->close();

$conn->close();
?>

