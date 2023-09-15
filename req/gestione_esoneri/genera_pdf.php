<?php
require('../../assets/plugins/fpdf/fpdf.php');

// Ottieni l'ID dell'esame dalla richiesta GET
$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$id) {
    die('ID dell\'esame non specificato.');
}

// Connessione al database (sostituisci con i tuoi dati di connessione)
include "../../db_connector.php";

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Query SQL per ottenere le informazioni dell'esame
$sql = "SELECT insegnamento, docente, DATE_FORMAT(data_esonero, '%d-%m-%Y') AS data_esonero
        FROM sx_esamidisponibili
        WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($insegnamento, $docente, $data_esonero);
$stmt->fetch();

// Chiudi la connessione al database
$stmt->close();

// Crea una nuova istanza di FPDF
$pdf = new FPDF();
$pdf->AddPage();

// Imposta il font e le dimensioni del testo
$pdf->SetFont('Arial', 'B', 16); // Dimensioni ridotte a 10

// Aggiungi "Nome Esame - Professore" al PDF
$nomeProfessore = 'Esame: ' . $insegnamento . ' - Docente: ' . $docente;
$pdf->Cell(80, 10, $nomeProfessore, 0, 1); // Imposta il parametro finale su 1 per andare a una nuova linea

// Aggiungi "Data Esame" al PDF
$pdf->SetFont('Arial', '', 12   ); // Dimensioni ridotte a 10
$pdf->Cell(80, 10, 'Data Esame: ' . $data_esonero, 0, 1); // Imposta il parametro finale su 1 per andare a una nuova linea

// Query SQL per ottenere i partecipanti all'esame dalla tabella "sx_prenesami" e ordinarli per cognome
$sql_partecipanti = "SELECT nome, cognome, matricola, email
        FROM sx_prenesami
        WHERE id_esame = ?
        ORDER BY cognome";
$stmt_partecipanti = $conn->prepare($sql_partecipanti);
$stmt_partecipanti->bind_param("i", $id);
$stmt_partecipanti->execute();
$result_partecipanti = $stmt_partecipanti->get_result();

// Aggiungi una tabella per i partecipanti
$pdf->SetFont('Arial', 'B', 10); // Dimensioni ridotte a 10
$pdf->Cell(10, 10, 'N.', 1);
$pdf->Cell(30, 10, 'Cognome', 1);
$pdf->Cell(30, 10, 'Nome', 1);
$pdf->Cell(30, 10, 'Matricola', 1);
$pdf->Cell(60, 10, 'Email', 1);
$pdf->Ln(); // Vai alla riga successiva

// Inizializza il contatore per il numero progressivo
$numeroProgressivo = 1;

// Aggiungi i partecipanti alla tabella
$pdf->SetFont('Arial', '', 10); // Dimensioni ridotte a 10
while ($row_partecipanti = $result_partecipanti->fetch_assoc()) {
    $pdf->Cell(10, 10, $numeroProgressivo, 1);
    $pdf->Cell(30, 10, $row_partecipanti['cognome'], 1);
    $pdf->Cell(30, 10, $row_partecipanti['nome'], 1);
    $pdf->Cell(30, 10, $row_partecipanti['matricola'], 1);
    $pdf->Cell(60, 10, $row_partecipanti['email'], 1);
    $pdf->Ln(); // Vai alla riga successiva
    $numeroProgressivo++;
}

// Genera il PDF e scaricalo
$pdf->Output('esame_' . $id . '.pdf', 'D'); // 'D' indica il download del file

// Assicurati di terminare lo script
exit;
?>
