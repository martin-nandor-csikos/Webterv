<?php
require "databaseConnection.php";
connect();

$sqlQuery = "SELECT * FROM news";
$eredmeny = $csatlakozas->query($sqlQuery);

if ($eredmeny->num_rows > 0) {
    while ($cikk = $eredmeny->fetch_assoc()) {
        echo "<div class='news'>";
        echo "<p id='datum'>" . $cikk['datum'] . "</p>";
        echo "<h1 id='cim'>" . $cikk['cim'] . "</h1>";
        echo "<p id='szoveg'>" . $cikk['szoveg'] . "</p>";
        echo "</div>";
    }
}

disconnect();
?>