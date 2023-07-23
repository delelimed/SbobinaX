<?php
// Connessione al database (sostituisci queste variabili con le tue credenziali)
include '../../db_connector.php';
session_start();

// Funzione per ottenere gli ID dei sbobinatori dati l'ID della sbobina
function get_sbobinatore_ids($sbobina_id, $conn) {
    // Query per recuperare gli ID dei sbobinatori associati alla sbobina
    $query = "SELECT id_sbobinatore FROM sbobinatori_sbobine WHERE id_sbobina = $sbobina_id";
    $result = $conn->query($query);

    $sbobinatori_ids = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $sbobinatori_ids[] = $row['id_sbobinatore'];
        }
    }

    return $sbobinatori_ids;
}

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Ottenere l'ID dell'utente corrente (puoi impostarlo come necessario)
$user_id = $_SESSION['id']; // Sostituisci con l'ID utente corrente

// Query per recuperare le righe in base all'utente corrente ($user_id)
$sql = "SELECT sbobine_calendarizzate.id, sbobine_calendarizzate.insegnamento, sbobine_calendarizzate.data_lezione, sbobine_calendarizzate.caricata, sbobine_calendarizzate.revisione
        FROM sbobine_calendarizzate
        LEFT JOIN revisori_sbobine ON sbobine_calendarizzate.id = revisori_sbobine.id_sbobina
        LEFT JOIN sbobinatori_sbobine ON sbobine_calendarizzate.id = sbobinatori_sbobine.id_sbobina
        WHERE revisori_sbobine.id_revisore = $user_id OR sbobinatori_sbobine.id_sbobinatore = $user_id";

$result = $conn->query($sql);

// Array per contenere i risultati
$sbobine_array = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Aggiungi la logica per determinare lo stato in base ai valori delle colonne "caricata" e "revisione"
        $status = "";
        if ($row['caricata'] == 0 && $row['revisione'] == 0) {
            $status = "Da Caricare";
        } elseif ($row['caricata'] == 1 && $row['revisione'] == 0) {
            $status = "In Attesa di Revisione";
        } elseif ($row['caricata'] == 1 && $row['revisione'] == 1) {
            $status = "Disponibile";
        }

        // Aggiungi lo stato al risultato
        $row['status'] = $status;

        // Ottieni gli ID dei sbobinatori corrispondenti
        $sbobina_id = $row['id'];
        $sbobinatori_ids = get_sbobinatore_ids($sbobina_id, $conn);

        // Aggiungi gli ID dei sbobinatori al risultato
        $row['sbobinatori_ids'] = $sbobinatori_ids;

        // Aggiungi la riga all'array risultante
        $sbobine_array[] = $row;
    }
}

// Chiudi la connessione al database
$conn->close();

// Restituisci i risultati come JSON
header('Content-Type: application/json');
echo json_encode($sbobine_array);
?>
