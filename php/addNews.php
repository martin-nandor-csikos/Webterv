<?php
require "databaseConnection.php";
connect();

$cim = $_POST['cim'];
$szoveg = $_POST['szoveg'];

if (isset($cim) && isset($szoveg)) {
    $sqlQuery = "INSERT INTO news (cim, szoveg) VALUES ('$cim', '$szoveg')";

    if ($csatlakozas->query($sqlQuery) === TRUE) {
        header("Location: ./../hirek.php");
    } else {
        echo "Hiba történt.";
    }
}
disconnect();
?>