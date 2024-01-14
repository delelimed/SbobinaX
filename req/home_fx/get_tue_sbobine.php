<?php
// Connessione al database (sostituisci queste variabili con le tue credenziali)
include '../../db_connector.php';
session_start();

// Funzione per ottenere gli ID dei sbobinatori dati l'ID della sbobina
function get_sbobinatore_ids($sbobina_id, $conn) {
    // Query parametrica per recuperare gli ID dei sbobinatori associati alla sbobina
    $query = "SELECT id_sbobinatore FROM sx_sbobinatori_sbobine WHERE id_sbobina = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $sbobina_id);
    $stmt->execute();

    $result = $stmt->get_result();

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

// Query parametrica per recuperare le righe in base all'utente corrente ($user_id)
$sql = "SELECT sx_sbobine_calendarizzate.id, sx_sbobine_calendarizzate.insegnamento, sx_sbobine_calendarizzate.data_lezione, sx_sbobine_calendarizzate.caricata, sx_sbobine_calendarizzate.revisione
        FROM sx_sbobine_calendarizzate
        LEFT JOIN sx_revisori_sbobine ON sx_sbobine_calendarizzate.id = sx_revisori_sbobine.id_sbobina
        LEFT JOIN sx_sbobinatori_sbobine ON sx_sbobine_calendarizzate.id = sx_sbobinatori_sbobine.id_sbobina
        WHERE sx_revisori_sbobine.id_revisore = ? OR sx_sbobinatori_sbobine.id_sbobinatore = ? ORDER BY data_lezione";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $user_id, $user_id);
$stmt->execute();

$result = $stmt->get_result();

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

// Chiudi il prepared statement e la connessione al database
$stmt->close();
$conn->close();

// Restituisci i risultati come JSON
header('Content-Type: application/json');
echo json_encode($sbobine_array);
?>

