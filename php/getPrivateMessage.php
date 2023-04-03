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
    //Kiiratjuk az időt, az üzenet küldőjét, címzettét, és az üzenetet
    while ($uzenet = $eredmeny->fetch_assoc()) {
        echo $uzenet['datetime'] . "<br>";
        echo "Küldő: " . $uzenet['sentFrom'] . "<br>";
        echo "Címzett: " . $uzenet['sentTo'] . "<br>";
        echo "Üzenet: " . $uzenet['message'] . "<br><br>";
    }
} else {
    echo "Üres a postaládád.";
}

disconnect();
?>