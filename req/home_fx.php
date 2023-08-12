<?php
include '../db_connector.php';
$sql = "SELECT COUNT(*) as num_sbobine_da_svolgere FROM sx_sbobine_calendarizzate WHERE caricata = 0";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $num_sbobine_da_svolgere = $row['num_sbobine_da_svolgere'];
} else {
    $num_sbobine_da_svolgere = 0;
}

$conn->close();
?>

<?php
include '../db_connector.php';
$sql = "SELECT COUNT(*) as num_sbobine_da_revisionare FROM sx_sbobine_calendarizzate WHERE caricata = 1 AND revisione = 0";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $num_sbobine_da_revisionare = $row['num_sbobine_da_revisionare'];
} else {
    $num_sbobine_da_revisionare = 0;
}

$conn->close();
?>

<?php
include '../db_connector.php';
$sql = "SELECT COUNT(*) as num_sbobine_pronte FROM sx_sbobine_calendarizzate WHERE caricata = 1 AND revisione = 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $num_sbobine_pronte = $row['num_sbobine_pronte'];
} else {
    $num_sbobine_pronte = 0;
}

$conn->close();
?>

<?php
include '../db_connector.php';
$sql = "SELECT COUNT(*) as num_sbobine FROM sx_sbobine_calendarizzate";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $num_sbobine = $row['num_sbobine'];
} else {
    $num_sbobine = 0;
}

$conn->close();
?>
