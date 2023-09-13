<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera i dati dal modulo
    $indServer = $_POST["indServer"];
    $uName = $_POST["uName"];
    $pass = $_POST["pssw"];
    $db_name = $_POST["nDatabase"];

    // Connessione al database con le nuove credenziali
    $conn = new mysqli($indServer, $uName, $pass);

    // Verifica la connessione al database
    if ($conn->connect_error) {
        die("Connessione al database fallita: " . $conn->connect_error);
    }

    // Query per cercare il database
    $check_db_query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$db_name'";
    $check_db_result = $conn->query($check_db_query);

    if (!$check_db_result || $check_db_result->num_rows === 0) {
        // Il database non esiste, quindi lo creiamo
        $create_db_query = "CREATE DATABASE $db_name";
        if ($conn->query($create_db_query) === TRUE) {
            // Crea il contenuto per il file "db_connector.php"
            $db_connector_content = '<?php' . PHP_EOL;
            $db_connector_content .= '$sName = "' . $indServer . '";' . PHP_EOL;
            $db_connector_content .= '$uName = "' . $uName . '";' . PHP_EOL;
            $db_connector_content .= '$pass = "' . $pass . '";' . PHP_EOL;
            $db_connector_content .= '$db_name = "' . $db_name . '";' . PHP_EOL;
            $db_connector_content .= '$conn = mysqli_connect($sName, $uName, $pass, $db_name);'. PHP_EOL;
            $db_connector_content .= 'if (!$conn) {'. PHP_EOL;
            $db_connector_content .= 'echo "Connection failed!";'. PHP_EOL;
            $db_connector_content .= '}'. PHP_EOL;
            $db_connector_content .= '?>';

            // Scrivi il contenuto nel file "db_connector.php"
            file_put_contents('../db_connector.php', $db_connector_content);

            echo "Il database è stato creato con successo e le nuove credenziali sono state salvate nel file 'db_connector.php'.";
        } else {
            echo "Errore durante la creazione del database: " . $conn->error;
        }
    } else {
        echo "Il database esiste già.";
    }

    // Connessione al database con le nuove credenziali
    $conn = new mysqli($indServer, $uName, $pass, $db_name);

    // Query per creare la tabella sx_insegnamenti
    $create_table_insegnamenti_query = "CREATE TABLE `sx_insegnamenti` (
        `id` int(11) NOT NULL,
        `materia` varchar(255) NOT NULL
        PRIMARY KEY (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

    if ($conn->query($create_table_insegnamenti_query) === TRUE) {
        echo "La tabella 'sx_insegnamenti' è stata creata con successo.";
    } else {
        echo "Errore durante la creazione della tabella 'sx_insegnamenti': " . $conn->error;
    }

    $conn->close();
} else {
    echo "Errore: Richiesta non valida.";
}

// NON MODIFICARE NULLA QUI SOTTO!!!

$conn = mysqli_connect($sName, $uName, $pass, $db_name);

if (!$conn) {
    echo "Connection failed!";
}
?>


