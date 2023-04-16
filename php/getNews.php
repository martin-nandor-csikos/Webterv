<?php
require "databaseConnection.php";
connect();

$sqlQuery = "SELECT * FROM news";
$eredmeny = $csatlakozas->query($sqlQuery);

if ($eredmeny->num_rows > 0) {
    while ($cikk = $eredmeny->fetch_assoc()) {
        echo "<p>" . $cikk['datum'] . "</p>";
        echo "<h1>" . $cikk['cim'] . "</h1>";
        echo "<p>" . $cikk['szoveg'] . "</p>";
    }
}

disconnect();
?>