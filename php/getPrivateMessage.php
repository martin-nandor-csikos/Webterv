<?php
require "databaseConnection.php";
connect();

//Bejelentkezett user felhasználónevének eltárolása
$fhnev = $_SESSION['fhnev'];

//SQL utasítás, ami lekéri az összes olyan üzenetet, amit vagy a usernek küldtek, vagy ő küldött valakinek
$sqlQuery = "SELECT sentTo, sentFrom, message, datetime FROM private_messages WHERE sentTo='$fhnev' OR sentFrom='$fhnev'";
$eredmeny = $csatlakozas->query($sqlQuery);

//Ha van eredmény
if ($eredmeny->num_rows > 0) {
    echo "<div id='messages-container'>";
    //Kiiratjuk az időt, az üzenet küldőjét, címzettét, és az üzenetet
    while ($uzenet = $eredmeny->fetch_assoc()) {
        echo "<div class=\"message\">";
        echo "<p class=\"datetime\">" . $uzenet['datetime'] . "</p>";
        echo "<p class=\"sentFrom\">Küldő: " . $uzenet['sentFrom'] . "</p>";
        echo "<p class=\"sentTo\">Címzett: " . $uzenet['sentTo'] . "</p>";
        echo "<p class=\"message\">Üzenet: " . $uzenet['message'] . "</p>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "<p class='some'>Üres a postaládád.</p>";
}

disconnect();
?>
