<?php
// Connettiti al tuo database MySQL (modifica le credenziali con quelle del tuo database)
include "../../db_connector.php";

// Controlla la connessione
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Query per selezionare gli eventi dalla tabella, includendo il nome della materia, l'argomento, 'caricata' e 'revisionata'
$sql = "SELECT sx_sbobine_calendarizzate.id AS id_sbobina, sx_sbobine_calendarizzate.data_lezione, sx_insegnamenti.materia, sx_sbobine_calendarizzate.argomento, 
        sx_sbobine_calendarizzate.caricata, sx_sbobine_calendarizzate.revisione
        FROM sx_sbobine_calendarizzate
        JOIN sx_insegnamenti ON sx_sbobine_calendarizzate.insegnamento = sx_insegnamenti.id";



$result = $conn->query($sql);

$events = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id_sbobina = $row["id_sbobina"];

        // Query per ottenere gli ID degli sbobinatori corrispondenti all'id_sbobina dalla tabella "sbobinatori_sbobine"
        $sql_sbobinatori = "SELECT id_sbobinatore FROM sx_sbobinatori_sbobine WHERE id_sbobina = '$id_sbobina'";
        $result_sbobinatori = $conn->query($sql_sbobinatori);

        $id_sbobinatori = array();
        if ($result_sbobinatori->num_rows > 0) {
            while ($row_sbobinatori = $result_sbobinatori->fetch_assoc()) {
                $id_sbobinatore = $row_sbobinatori["id_sbobinatore"];

                // Query per ottenere il nome e il cognome dell'utente corrispondente all'id_sbobinatore dalla tabella "users"
                $sql_sbobinatore_info = "SELECT nome, cognome FROM sx_users WHERE id = '$id_sbobinatore'";
                $result_sbobinatore_info = $conn->query($sql_sbobinatore_info);

                if ($result_sbobinatore_info->num_rows > 0) {
                    while ($row_sbobinatore_info = $result_sbobinatore_info->fetch_assoc()) {
                        $nome_sbobinatore = $row_sbobinatore_info["nome"];
                        $cognome_sbobinatore = $row_sbobinatore_info["cognome"];

                        // Puoi combinare nome e cognome per ottenere il nome completo dello sbobinatore
                        $nome_completo_sbobinatore = $nome_sbobinatore . ' ' . $cognome_sbobinatore;

                        $id_sbobinatori[] = $nome_completo_sbobinatore;
                    }
                }
            }
        }

        // Query per ottenere gli ID dei revisori corrispondenti all'id_sbobina dalla tabella "revisori_sbobine"
        $sql_revisori = "SELECT id_revisore FROM sx_revisori_sbobine WHERE id_sbobina = '$id_sbobina'";
        $result_revisori = $conn->query($sql_revisori);

        $id_revisori = array();
        if ($result_revisori->num_rows > 0) {
            while ($row_revisori = $result_revisori->fetch_assoc()) {
                $id_revisore = $row_revisori["id_revisore"];

                // Query per ottenere il nome e il cognome dell'utente corrispondente all'id_revisore dalla tabella "users"
                $sql_revisore_info = "SELECT nome, cognome FROM sx_users WHERE id = '$id_revisore'";
                $result_revisore_info = $conn->query($sql_revisore_info);

                if ($result_revisore_info->num_rows > 0) {
                    while ($row_revisore_info = $result_revisore_info->fetch_assoc()) {
                        $nome_revisore = $row_revisore_info["nome"];
                        $cognome_revisore = $row_revisore_info["cognome"];

                        // Puoi combinare nome e cognome per ottenere il nome completo del revisore
                        $nome_completo_revisore = $nome_revisore . ' ' . $cognome_revisore;

                        $id_revisori[] = $nome_completo_revisore;
                    }
                }
            }
        }

        $event = array(
            "title" => $row["materia"],
            "start" => $row["data_lezione"],
            "argomento" => $row["argomento"],
            "caricata" => intval($row["caricata"]), // Converti il valore in un numero intero (0 o 1)
            "revisionata" => intval($row["revisione"]),
            "id_sbobinatori" => $id_sbobinatori,
            "id_revisori" => $id_revisori

        );

        $events[] = $event;
    }
}

// Chiudi la connessione al database
$conn->close();

// Restituisci gli eventi in formato JSON
header("Content-Type: application/json");
echo json_encode($events);
?>
